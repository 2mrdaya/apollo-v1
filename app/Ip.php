<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ip
 *
 * @package App
 * @property string $uhid
 * @property string $bill_date
 * @property string $ip_no
 * @property string $patient_name
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $bill_no
 * @property string $customer_name
 * @property decimal $total_service_amount
 * @property decimal $tax_amount
 * @property decimal $total_bill_amount
 * @property decimal $tcs_tax
 * @property decimal $discount_amount
 * @property string $doctor_name
 * @property string $speciality
 * @property string $surgical_package_name
 * @property decimal $total_pharmacy_amount
 * @property decimal $pharmacy_amt
 * @property decimal $total_consumables
 * @property string $bill_to
 * @property string $admission_date
 * @property string $discharge_date
*/
class Ip extends Model
{
    use SoftDeletes;

    protected $fillable = ['uhid', 'bill_date', 'ip_no', 'patient_name', 'country', 'state', 'city', 'bill_no', 'customer_name', 'total_service_amount', 'tax_amount', 'total_bill_amount', 'tcs_tax', 'discount_amount', 'doctor_name', 'speciality', 'surgical_package_name', 'total_pharmacy_amount', 'pharmacy_amt', 'total_consumables', 'bill_to', 'admission_date', 'discharge_date'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Ip::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setBillDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['bill_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['bill_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getBillDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setTotalServiceAmountAttribute($input)
    {
        $this->attributes['total_service_amount'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setTaxAmountAttribute($input)
    {
        $this->attributes['tax_amount'] = $input ? $input : null;
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
    public function setTcsTaxAttribute($input)
    {
        $this->attributes['tcs_tax'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setDiscountAmountAttribute($input)
    {
        $this->attributes['discount_amount'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setTotalPharmacyAmountAttribute($input)
    {
        $this->attributes['total_pharmacy_amount'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPharmacyAmtAttribute($input)
    {
        $this->attributes['pharmacy_amt'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setTotalConsumablesAttribute($input)
    {
        $this->attributes['total_consumables'] = $input ? $input : null;
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
    
}
