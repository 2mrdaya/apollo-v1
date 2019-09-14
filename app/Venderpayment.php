<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Venderpayment
 *
 * @package App
 * @property string $name
 * @property string $oracle_code
 * @property string $pan
 * @property decimal $bill_amount
 * @property decimal $total_pharmacy
 * @property decimal $total_consumables
 * @property decimal $gst_amount
 * @property decimal $tds_amount
 * @property decimal $payable_amount
 * @property decimal $net_bill_amount
 * @property string $account_no
 * @property string $ifsc_code
 * @property string $bank_name
 * @property string $address
 * @property string $iban_number
 * @property string $swift_code
*/
class Venderpayment extends Model
{
    protected $fillable = ['name', 'oracle_code', 'pan', 'bill_amount', 'total_pharmacy', 'total_consumables', 'gst_amount', 'tds_amount', 'payable_amount', 'net_bill_amount', 'account_no', 'ifsc_code', 'bank_name', 'address', 'iban_number', 'swift_code'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Venderpayment::observe(new \App\Observers\UserActionsObserver);
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
    public function setTotalPharmacyAttribute($input)
    {
        $this->attributes['total_pharmacy'] = $input ? $input : null;
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
     * Set attribute to money format
     * @param $input
     */
    public function setGstAmountAttribute($input)
    {
        $this->attributes['gst_amount'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setTdsAmountAttribute($input)
    {
        $this->attributes['tds_amount'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPayableAmountAttribute($input)
    {
        $this->attributes['payable_amount'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setNetBillAmountAttribute($input)
    {
        $this->attributes['net_bill_amount'] = $input ? $input : null;
    }
    
}
