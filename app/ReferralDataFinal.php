<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ReferralDataFinal
 *
 * @package App
 * @property enum $vendor
 * @property string $month
 * @property string $msg_desc
 * @property string $doi_as_per_whats_app
 * @property string $doi_as_per_sw
 * @property string $area
 * @property string $uhid
 * @property string $bill_no
 * @property string $dr_name_aic
 * @property decimal $fee_percent
 * @property decimal $aic_fee
 * @property string $oracle_code
 * @property string $pateint_name_msg
 * @property string $avip_name_msg
 * @property string $remarks
 * @property tinyInteger $approve
 * @property enum $status
 * @property string $ip
 * @property string $message
 * @property string $patient
 * @property string $avip
*/
class ReferralDataFinal extends Model
{
    use SoftDeletes;

    protected $fillable = ['vendor', 'month', 'msg_desc', 'doi_as_per_whats_app', 'doi_as_per_sw', 'area', 'uhid', 'bill_no', 'dr_name_aic', 'fee_percent', 'aic_fee', 'oracle_code', 'pateint_name_msg', 'avip_name_msg', 'remarks', 'approve', 'status', 'ip_id', 'message_id', 'patient_id', 'avip_id'];
    protected $hidden = [];


    public static function boot()
    {
        parent::boot();

        ReferralDataFinal::observe(new \App\Observers\UserActionsObserver);
    }

    public static $enum_vendor = ["PPN" => "PPN", "HCF" => "HCF"];

    public static $enum_status = ["Ok" => "Ok", "LateIntimation" => "LateIntimation", "Reject" => "Reject", "CarryForward" => "CarryForward", "RepeatAdmission" => "RepeatAdmission", "Other" => "Other"];

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDoiAsPerWhatsAppAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['doi_as_per_whats_app'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['doi_as_per_whats_app'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDoiAsPerWhatsAppAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDoiAsPerSwAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['doi_as_per_sw'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['doi_as_per_sw'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDoiAsPerSwAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setFeePercentAttribute($input)
    {
        $this->attributes['fee_percent'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setAicFeeAttribute($input)
    {
        $this->attributes['aic_fee'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setIpIdAttribute($input)
    {
        $this->attributes['ip_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setMessageIdAttribute($input)
    {
        $this->attributes['message_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setPatientIdAttribute($input)
    {
        $this->attributes['patient_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setAvipIdAttribute($input)
    {
        $this->attributes['avip_id'] = $input ? $input : null;
    }

    public function ip()
    {
        return $this->belongsTo(Ip::class, 'ip_id')->withTrashed();
    }

    public function message()
    {
        return $this->belongsTo(MessageMapping::class, 'message_id')->withTrashed();
    }

    public function patient()
    {
        return $this->belongsTo(PatientRegistration::class, 'patient_id')->withTrashed();
    }

    public function avip()
    {
        return $this->belongsTo(Avip::class, 'avip_id')->withTrashed();
    }

    public function getIp()
    {
        echo "Hi";die;
        return \App\Ip::where('bill_no','bill_no')->first();
    }
}
