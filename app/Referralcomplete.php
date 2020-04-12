<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Referralcomplete
 *
 * @package App
 * @property enum $vendor
 * @property string $month
 * @property string $msg_desc
 * @property string $doi_as_per_whats_app
 * @property string $doi_as_per_sw
 * @property string $area
 * @property string $uhid
 * @property string $oracle_code
 * @property string $ip_no
 * @property string $bill_no
 * @property string $dr_name_aic
 * @property string $pan_no
 * @property string $admission_date
 * @property string $discharge_date
 * @property string $registration_date
 * @property string $patient_name
 * @property string $company
 * @property string $country
 * @property string $treating_consultant
 * @property string $specialty
 * @property string $bill_to
 * @property decimal $bill_amount
 * @property decimal $pharmacy
 * @property decimal $consumable
 * @property decimal $bonus_percent
 * @property decimal $bonus
 * @property decimal $gst
 * @property decimal $fee_percent
 * @property decimal $aic_fee
 * @property string $remarks
*/
class Referralcomplete extends Model
{
    use SoftDeletes;

    protected $fillable = ['vendor', 'month', 'msg_desc', 'doi_as_per_whats_app', 'doi_as_per_sw', 'area', 'uhid', 'oracle_code', 'ip_no', 'bill_no', 'dr_name_aic', 'pan_no', 'admission_date', 'discharge_date', 'registration_date', 'patient_name', 'company', 'country', 'treating_consultant', 'specialty', 'bill_to', 'bill_amount', 'pharmacy', 'consumable', 'bonus_percent', 'bonus', 'gst', 'fee_percent', 'aic_fee', 'remarks'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Referralcomplete::observe(new \App\Observers\UserActionsObserver);
    }

    public static $enum_vendor = ["PPN" => "PPN", "HCF" => "HCF"];

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
     * Set attribute to date format
     * @param $input
     */
    public function setAdmissionDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['admission_date'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['admission_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getAdmissionDateAttribute($input)
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
    public function setDischargeDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['discharge_date'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['discharge_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDischargeDateAttribute($input)
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
    public function setRegistrationDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['registration_date'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['registration_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getRegistrationDateAttribute($input)
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
    public function setBillAmountAttribute($input)
    {
        $this->attributes['bill_amount'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPharmacyAttribute($input)
    {
        $this->attributes['pharmacy'] = $input ? $input : null;
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
    public function setBonusPercentAttribute($input)
    {
        $this->attributes['bonus_percent'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setBonusAttribute($input)
    {
        $this->attributes['bonus'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setGstAttribute($input)
    {
        $this->attributes['gst'] = $input ? $input : null;
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
    
}
