<?php

namespace App\Helpers;
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
        $row['referrer_name'] = SELF::FindNames('find_avip', $row["message"]);
        //var_dump($row);die();
        return $row;
    }

    public static function MessageMappingWhatsAppProcess($row) {
        //$row['intimation_date_time'] = Carbon::createFromFormat(config('app.date_format_sms'), $row['intimation_date_time'])->format('Y-m-d H:i:s');
        $row['patient_name'] = SELF::FindNames('find_patient', $row["message"]);
        $row['referrer_name'] = SELF::FindNames('find_avip', $row["message"]);
        //var_dump($row);die();
        return $row;
    }

    public static function MessageMappingEmailProcess($row) {
        $row['intimation_date_time'] = Carbon::createFromFormat(config('app.date_format_sms'), $row['intimation_date_time'])->format('Y-m-d H:i:s');
        $row['patient_name'] = SELF::FindNames('find_patient', $row["message"]);
        $row['referrer_name'] = SELF::FindNames('find_avip', $row["message"]);
        //var_dump($row);die();
        return $row;
    }

    public static function MessageMappingOtherProcess($row) {
        $row['intimation_date_time'] = Carbon::createFromFormat(config('app.date_format_sms'), $row['intimation_date_time'])->format('Y-m-d H:i:s');
        $row['patient_name'] = SELF::FindNames('find_patient', $row["message"]);
        $row['referrer_name'] = SELF::FindNames('find_avip', $row["message"]);
        //var_dump($row);die();
        return $row;
    }

    public static function ReferralDataFinalProcess($row) {
        try {
            //$row['date_time_of_int'] = $row['date_time_of_int'] ? Carbon::createFromFormat(config('app.date_format_intimation'), str_replace(';',':',$row['date_time_of_int']))->format('Y-m-d H:i:s') : null;
        } catch (\Exception $e) {
            var_dump($row);die;
            $row['remarks'] = 'Tempered Date Formate ' + $row['date_time_of_int'];
            $row['date_time_of_int'] = null;
        }

        try {
            //$row['date_time_of_reg'] = $row['date_time_of_reg'] ? Carbon::createFromFormat(config('app.date_format_registration'), str_replace(';',':',$row['date_time_of_reg']))->format('Y-m-d H:i:s') : null;
        } catch (\Exception $e) {
            $row['remarks'] = 'Tempered Date Formate ' + $row['date_time_of_reg'];
            $row['date_time_of_reg'] = null;
        }

        try {
            //$row['admission_time'] = $row['admission_time'] ? Carbon::createFromFormat(config('app.date_format_admission'), str_replace(';',':',$row['admission_time']))->format('Y-m-d H:i:s') : null;
        } catch (\Exception $e) {
            $row['remarks'] = 'Tempered Date Formate ' + $row['admission_time'];
            $row['admission_time'] = null;
        }

        try {
            //$row['date_of_discharged'] = $row['date_of_discharged'] ? Carbon::createFromFormat(config('app.date_format_admission'), str_replace(';',':',$row['date_of_discharged']))->format('Y-m-d H:i:s') : null;
        } catch (\Exception $e) {
            $row['remarks'] = 'Tempered Date Formate ' + $row['date_of_discharged'];
            $row['date_of_discharged'] = null;
        }

        try {
            //$row['msg_date_time'] = $row['msg_date_time'] ? Carbon::createFromFormat(config('app.date_format_sms'), str_replace(';',':',$row['msg_date_time']))->format('Y-m-d H:i:s') : null;
        } catch (\Exception $e) {
            $row['remarks'] = 'Tempered Date Formate ' + $row['msg_date_time'];
            $row['msg_date_time'] = null;
        }

        $row['fee_percent'] = $row['fee_percent'] ? str_replace('%','',$row['fee_percent']) : 0;

        return $row;
    }

    public static function PatientRegistrationProcess($row) {
        $row['registration_date'] = Carbon::createFromFormat(config('app.date_format_patient_registration'), $row['registration_date'])->format('Y-m-d H:i:s');
        return $row;
    }

    public static function IpProcess($row) {
        $row['bill_date'] = Carbon::createFromFormat(config('app.date_format_bill_date'), $row['bill_date'])->format('Y-m-d H:i:s');
        return $row;
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
}
