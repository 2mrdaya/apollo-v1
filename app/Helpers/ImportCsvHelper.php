<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Classes\WhatsAppFormatting;

class ImportCsvHelper {
    /**
     * @param string [] $row
     *
     * @return string []
     */

    public static function MessageMappingWhatsAppParse($file) {
        $fileName = storage_path('app/csv_import/' . $file);
        $fileName = WhatsAppFormatting::formatWhatsAppFile($fileName);
        return $fileName;
    }

    public static function MessageMappingSmsProcess($row) {
        $row['intimation_date_time'] = Carbon::createFromFormat(config('app.date_format_sms'), $row['intimation_date_time'])->format('Y-m-d H:i:s');
        $row['patient_name'] = SELF::FindNames('find_patient', $row["message"]);
        $row['patient_name'] = trim(preg_replace('/\s+/',' ', $row['patient_name']));
        $row['referrer_name'] = SELF::FindNames('find_avip', $row["message"]);
        $row['referrer_name'] = trim(preg_replace('/\s+/',' ', $row['referrer_name']));
        $row['message'] = substr(trim($row['message']),0,500);
        return $row;
    }

    public static function MessageMappingWhatsAppProcess($row) {
        $row['intimation_date_time'] = Carbon::createFromFormat(config('app.date_format_whatsapp'), $row['intimation_date_time'])->format('Y-m-d H:i:s');
        $row['patient_name'] = SELF::FindNames('find_patient', $row["message"]);
        $row['patient_name'] = trim(preg_replace('/\s+/',' ', $row['patient_name']));
        $row['referrer_name'] = SELF::FindNames('find_avip', $row["message"]);
        $row['referrer_name'] = trim(preg_replace('/\s+/',' ', $row['referrer_name']));
        $row['message'] = substr(trim($row['message']),0,500);
        //var_dump($row);die();
        return $row;
    }

    public static function MessageMappingEmailProcess($row) {
        $row['intimation_date_time'] = Carbon::createFromFormat(config('app.date_format_sms'), $row['intimation_date_time'])->format('Y-m-d H:i:s');
        $row['patient_name'] = SELF::FindNames('find_patient', $row["message"]);
        $row['patient_name'] = trim(preg_replace('/\s+/',' ', $row['patient_name']));
        $row['referrer_name'] = SELF::FindNames('find_avip', $row["message"]);
        $row['referrer_name'] = trim(preg_replace('/\s+/',' ', $row['referrer_name']));
        $row['message'] = substr(trim($row['message']),0,500);
        //var_dump($row);die();
        return $row;
    }

    public static function MessageMappingOtherProcess($row) {
        //$row['intimation_date_time'] = Carbon::createFromFormat(config('app.date_format_sms'), $row['intimation_date_time'])->format('Y-m-d H:i:s');
        $row['patient_name'] = SELF::FindNames('find_patient', $row["message"]);
        $row['patient_name'] = trim(preg_replace('/\s+/',' ', $row['patient_name']));
        $row['referrer_name'] = SELF::FindNames('find_avip', $row["message"]);
        $row['referrer_name'] = trim(preg_replace('/\s+/',' ', $row['referrer_name']));
        $row['message'] = substr(trim($row['message']),0,500);
        //var_dump($row);die();
        return $row;
    }

    public static function ReferralDataFinalProcess($row) {
        $row['doi_as_per_whats_app'] = isset($row['doi_as_per_whats_app']) ? trim($row['doi_as_per_whats_app']) : "";
        $row['doi_as_per_sw'] = isset($row['doi_as_per_sw']) ? trim($row['doi_as_per_sw']) : "";
        $row['doi_as_per_whats_app'] = $row['doi_as_per_whats_app'] ? Carbon::createFromFormat(config('app.doi_as_per_whats_app'), str_replace(';',':',$row['doi_as_per_whats_app']))->format('Y-m-d H:i:s') : null;
        $row['doi_as_per_sw'] = $row['doi_as_per_sw'] ? Carbon::createFromFormat(config('app.doi_as_per_sw'), str_replace(';',':',$row['doi_as_per_sw']))->format('Y-m-d H:i:s') : null;
        $row['msg_desc'] = isset($row['msg_desc']) ? substr(trim($row['msg_desc']),0,500) : "";
        $row['fee_percent'] = $row['fee_percent'] ? str_replace('%','',$row['fee_percent']) : 0;

        return $row;
    }

    public static function PatientRegistrationProcess($row) {
        $row['patient_name'] = trim(preg_replace('/\s+/',' ', $row['patient_name']));
        $row['registration_date'] = $row['registration_date'] ? Carbon::createFromFormat(config('app.date_format_patient_registration'), $row['registration_date'])->format('Y-m-d H:i:s') : null;
        return $row;
    }

    public static function IpProcess($row) {
        $row['bill_date'] = $row['bill_date'] ? Carbon::createFromFormat(config('app.date_format_bill_date'), $row['bill_date'])->format('Y-m-d H:i:s') : null;
        $row['admission_date'] = isset($row['admission_date']) ? ($row['admission_date'] ? Carbon::createFromFormat(config('app.date_format_bill_date'), $row['admission_date'])->format('Y-m-d H:i:s') : null) : null;
        $row['discharge_date'] = isset($row['discharge_date']) ? ($row['discharge_date'] ? Carbon::createFromFormat(config('app.date_format_bill_date'), $row['discharge_date'])->format('Y-m-d H:i:s') : null) : null;
        $row['total_pharmacy_amount'] = isset($row['total_pharmacy_amount']) ? (is_numeric($row['total_pharmacy_amount']) ? $row['total_pharmacy_amount'] : 0) : 0;
        $row['total_consumables'] = isset($row['total_consumables']) ? (is_numeric($row['total_consumables']) ? $row['total_consumables'] : 0) : 0;
        return $row;
    }

    public static function OpdProcess($row) {
        $row['bill_date'] = Carbon::createFromFormat(config('app.date_format_bill_date'), $row['bill_date'])->format('Y-m-d H:i:s');
        return $row;
    }

    public static function MessageMappingSmsPostProcess() {
        $query = DB::select(DB::raw(
            "DELETE t1 FROM message_mappings t1, message_mappings t2 WHERE t1.intimation_date_time > t2.intimation_date_time AND t1.message =t2.message"
        ));
        $query = DB::select(DB::raw(
            "DELETE t1 FROM message_mappings t1, message_mappings t2 WHERE t1.id > t2.id AND t1.message =t2.message AND t1.intimation_date_time = t2.intimation_date_time"
        ));
        return $query;
    }

    public static function MessageMappingWhatsAppPostProcess() {
        $query = DB::select(DB::raw(
            "DELETE t1 FROM message_mappings t1, message_mappings t2 WHERE t1.intimation_date_time > t2.intimation_date_time AND t1.message =t2.message"
        ));
        $query = DB::select(DB::raw(
            "DELETE t1 FROM message_mappings t1, message_mappings t2 WHERE t1.id > t2.id AND t1.message =t2.message AND t1.intimation_date_time = t2.intimation_date_time"
        ));
        return $query;
    }

    public static function PatientRegistrationPostProcess() {
        $query = DB::select(DB::raw(
            "DELETE t1 FROM patient_registrations t1, patient_registrations t2 WHERE t1.id > t2.id AND t1.uhid =t2.uhid"
        ));
        return $query;
    }

    public static function IpPostProcess() {
        $query = DB::select(DB::raw(
            "DELETE t1 FROM ips t1, ips t2 WHERE t1.id > t2.id AND t1.bill_no =t2.bill_no"
        ));
        return $query;
    }

    public static function OpdPostProcess() {
        $query = DB::select(DB::raw(
            "DELETE t1 FROM opds t1, opds t2 WHERE t1.id > t2.id AND t1.bill_no =t2.bill_no AND t1.bill_amount =t2.bill_amount"
        ));
        return $query;
    }

    public static function ReferralDataFinalPostProcess() {
        $query = DB::select(DB::raw(
            "DELETE t1 FROM referral_data_finals t1, referral_data_finals t2 WHERE t1.id > t2.id AND t1.uhid =t2.uhid AND t1.bill_no =t2.bill_no AND t1.aic_fee =t2.aic_fee"
        ));
        return $query;
    }

    public static function FindNames($module, $message) {
        $process = new Process(['python', '../app/Python/FindString.py', $module, $message]);
        $process->run();
        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        return $process->getOutput();
    }

    public static function RemoveBS($Str) {
        $StrArr = str_split($Str); $NewStr = '';
        foreach ($StrArr as $Char) {
          $CharNo = ord($Char);
          if ($CharNo == 163) { $NewStr .= $Char; continue; } // keep £
          if ($CharNo > 31 && $CharNo < 127) {
            $NewStr .= $Char;
          }
        }
        return $NewStr;
    }


    public static function GstimportValidate($row)
    {
        $errorStatus='';
        if(!empty($row))
        {
            if(isset($row['bill_no']) && !empty($row['bill_no']))
            {

            }
            else{
                $errorStatus.='Bill no required';
            }


            if(isset($row['gst_amout']) && !empty($row['gst_amout']))
            {
                if(!is_numeric($row['gst_amout'])){ $errorStatus.='GST amount should be number';}
            }
            else{
                $errorStatus.='GST amount required\r\n';
            }


            if(isset($row['booking_month']) && !empty($row['booking_month']))
            {

            }
            else{
                $errorStatus.='Booking  month required';
            }

            if(isset($row['payment_month']) && !empty($row['payment_month']))
            {

            }
            else{
                $errorStatus.='Payment month required';
            }

            if($errorStatus==''){
                $row['status']='Success';
            }
            else{
                $row['status']=$errorStatus;
            }

            return $row;
       }
    }

    public static function ReferralDataFinalValidate($row) {

        $errorStatus='';
        if(!empty($row))
        {
            if(isset($row['doi_as_per_whats_app']) && !empty($row['doi_as_per_whats_app']))
            {
                try {
                    $row['doi_as_per_whats_app'] = Carbon::createFromFormat(config('app.doi_as_per_whats_app'), str_replace(';',':',$row['doi_as_per_whats_app']))->format('Y-m-d H:i:s');
                } catch (\Exception $e) {
                    $errorStatus.='problem in doi_as_per_whats_app';
                }
            }

            if(isset($row['doi_as_per_sw']) && !empty($row['doi_as_per_sw']))
            {
                try {
                    $row['doi_as_per_sw'] = Carbon::createFromFormat(config('app.doi_as_per_sw'), str_replace(';',':',$row['doi_as_per_sw']))->format('Y-m-d H:i:s');
                } catch (\Exception $e) {
                    $errorStatus.='problem in doi_as_per_sw';
                }
            }

            if($errorStatus==''){
                $row['status']='Success';
            }
            else{
                $row['status']=$errorStatus;
            }
        }

        return $row;
    }

    public static function PatientRegistrationValidate($row)
    {
        $errorStatus='Success';

        if(!empty($row))
        {
            if(isset($row['registration_date']) && !empty($row['registration_date']))
            {
                try {
                    $row['registration_date'] = Carbon::createFromFormat(config('app.date_format_patient_registration'), $row['registration_date'])->format('Y-m-d H:i:s');
                } catch (\Exception $e) {
                    $errorStatus.='problem in doi_as_per_sw';
                }
            }else{
                $errorStatus.='registration_date should not blank';
            }

            if(isset($row['uhid']) && !empty($row['uhid']))
            {

            }else{
                $errorStatus.='uhid should not blank';
            }

            if(isset($row['patient_name']) && !empty($row['patient_name']))
            {

            }else{
                $errorStatus.='patient_name should not blank';
            }

            if(isset($row['country']) && !empty($row['country']))
            {

            }else{
                $errorStatus.='country should not blank';
            }

            if($errorStatus==''){
                $row['status']='Success';
            }
            else{
                $row['status']=$errorStatus;
            }
        }
        return $row;
    }

    public static function MessageMappingSmsValidate($row)
    {
        $errorStatus='Success';

        if(!empty($row))
        {

            if(isset($row['intimation_date_time']) && !empty($row['intimation_date_time']))
            {
                try {
                    $row['intimation_date_time'] = Carbon::createFromFormat(config('app.date_format_sms'), $row['intimation_date_time'])->format('Y-m-d H:i:s');
                } catch (\Exception $e) {
                    $errorStatus.='problem in doi_as_per_sw';
                }
            }else{
                $errorStatus.='intimation_date_time should not blank';
            }

            if(isset($row['source']) && !empty($row['source']))
            {

            }else{
                $errorStatus.='source should not blank';
            }

            if(isset($row['message']) && !empty($row['message']))
            {

            }else{
                $errorStatus.='message should not blank';
            }

            if($errorStatus==''){
                $row['status']='Success';
            }
            else{
                $row['status']=$errorStatus;
            }
        }
        return $row;
    }

    public static function MessageMappingWhatsAppValidate($row)
    {
        $errorStatus='Success';

        if(!empty($row))
        {

            /*if(isset($row['intimation_date_time']) && !empty($row['intimation_date_time']))
            {
                try {
                    $row['intimation_date_time'] = Carbon::createFromFormat(config('app.date_format_whatsapp'), $row['intimation_date_time'])->format('Y-m-d H:i:s');
                } catch (\Exception $e) {
                    $errorStatus.='problem in intimation_date_time';
                }
            }else{
                $errorStatus.='intimation_date_time should not blank';
            }*/

            if(isset($row['source']) && !empty($row['source']))
            {

            }else{
                $errorStatus.='source should not blank';
            }

            if(isset($row['message']) && !empty($row['message']))
            {

            }else{
                $errorStatus.='message should not blank';
            }

            if($errorStatus==''){
                $row['status']='Success';
            }
            else{
                $row['status']=$errorStatus;
            }
        }
        return $row;
    }
}
