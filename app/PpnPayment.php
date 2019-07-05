<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PpnPayment
 *
 * @package App
 * @property string $month
 * @property string $patientid
 * @property string $avipid
 * @property string $mapping
 * @property decimal $total_bill
 * @property decimal $total_pharmacy
 * @property decimal $total_consumable
 * @property string $rate_details
 * @property enum $on_total_bill
 * @property enum $type
 * @property integer $eligible_bill_amount
 * @property double $percentage
 * @property integer $amount
 * @property enum $status
 * @property text $remarks
*/
class PpnPayment extends Model
{
    use SoftDeletes;

    protected $fillable = ['month', 'total_bill', 'total_pharmacy', 'total_consumable', 'rate_details', 'on_total_bill', 'type', 'eligible_bill_amount', 'percentage', 'amount', 'status', 'remarks', 'patientid_id', 'avipid_id', 'mapping_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        PpnPayment::observe(new \App\Observers\UserActionsObserver);
    }

    public static $enum_on_total_bill = ["Yes" => "Yes", "No" => "No"];

    public static $enum_type = ["Percentage" => "Percentage", "Fixed" => "Fixed"];

    public static $enum_status = ["Ok" => "Ok", "Late Intimation" => "Late Intimation", "Other" => "Other"];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setPatientidIdAttribute($input)
    {
        $this->attributes['patientid_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setAvipidIdAttribute($input)
    {
        $this->attributes['avipid_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setMappingIdAttribute($input)
    {
        $this->attributes['mapping_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setTotalBillAttribute($input)
    {
        $this->attributes['total_bill'] = $input ? $input : null;
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
    public function setTotalConsumableAttribute($input)
    {
        $this->attributes['total_consumable'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setEligibleBillAmountAttribute($input)
    {
        $this->attributes['eligible_bill_amount'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setPercentageAttribute($input)
    {
        if ($input != '') {
            $this->attributes['percentage'] = $input;
        } else {
            $this->attributes['percentage'] = null;
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setAmountAttribute($input)
    {
        $this->attributes['amount'] = $input ? $input : null;
    }
    
    public function patientid()
    {
        return $this->belongsTo(Ip::class, 'patientid_id')->withTrashed();
    }
    
    public function avipid()
    {
        return $this->belongsTo(Avip::class, 'avipid_id')->withTrashed();
    }
    
    public function mapping()
    {
        return $this->belongsTo(MessageMapping::class, 'mapping_id')->withTrashed();
    }
    
}
