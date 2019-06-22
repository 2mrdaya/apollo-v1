<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Opd
 *
 * @package App
 * @property string $bill_date
 * @property string $bill_no
 * @property string $uhid
 * @property string $patient_number
 * @property string $pname
 * @property string $bill_type
 * @property decimal $bill_amount
 * @property decimal $discount_amount
 * @property decimal $net_amount
*/
class Opd extends Model
{
    use SoftDeletes;

    protected $fillable = ['bill_date', 'bill_no', 'uhid', 'patient_number', 'pname', 'bill_type', 'bill_amount', 'discount_amount', 'net_amount'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Opd::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setBillDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['bill_date'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
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
    public function setDiscountAmountAttribute($input)
    {
        $this->attributes['discount_amount'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setNetAmountAttribute($input)
    {
        $this->attributes['net_amount'] = $input ? $input : null;
    }
    
}
