<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ReferralData
 *
 * @package App
 * @property string $month
 * @property string $date_time_of_int
 * @property string $executive
 * @property string $area
 * @property string $patient_name
 * @property string $uhid
 * @property string $date_time_of_reg
 * @property string $ip_no
 * @property string $bill_no
 * @property string $admission_time
 * @property string $date_of_discharged
 * @property string $procedure_name
 * @property string $dr_name_aic
 * @property decimal $total_bill_amount
 * @property decimal $net_amount
 * @property decimal $aic_fee
 * @property decimal $fee_percent
 * @property string $treating_consultant
 * @property string $department
 * @property string $pan_no
 * @property string $remarks
 * @property string $message
 * @property string $msg_date_time
 * @property decimal $consumable
 * @property decimal $ward_pharmacy
*/
class ReferralData extends Model
{
    use SoftDeletes;

    protected $fillable = ['month', 'date_time_of_int', 'executive', 'area', 'patient_name', 'uhid', 'date_time_of_reg', 'ip_no', 'bill_no', 'admission_time', 'date_of_discharged', 'procedure_name', 'dr_name_aic', 'total_bill_amount', 'net_amount', 'aic_fee', 'fee_percent', 'treating_consultant', 'department', 'pan_no', 'remarks', 'message', 'msg_date_time', 'consumable', 'ward_pharmacy'];
    protected $hidden = [];


    public static function boot()
    {
        parent::boot();

        ReferralData::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateTimeOfRegAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date_time_of_reg'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['date_time_of_reg'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateTimeOfRegAttribute($input)
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
    public function setAdmissionTimeAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['admission_time'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['admission_time'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getAdmissionTimeAttribute($input)
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
    public function setDateOfDischargedAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date_of_discharged'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['date_of_discharged'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateOfDischargedAttribute($input)
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
    public function setTotalBillAmountAttribute($input)
    {
        $this->attributes['total_bill_amount'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setNetAmountAttribute($input)
    {
        $this->attributes['net_amount'] = $input ? $input : null;
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
     * Set attribute to money format
     * @param $input
     */
    public function setFeePercentAttribute($input)
    {
        $this->attributes['fee_percent'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setMsgDateTimeAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['msg_date_time'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['msg_date_time'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getMsgDateTimeAttribute($input)
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
    public function setConsumableAttribute($input)
    {
        $this->attributes['consumable'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setWardPharmacyAttribute($input)
    {
        $this->attributes['ward_pharmacy'] = $input ? $input : null;
    }

}
