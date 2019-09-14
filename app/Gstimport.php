<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gstimport
 *
 * @package App
 * @property string $bill_no
 * @property decimal $gst_amout
 * @property string $booking_month
 * @property string $payment_month
*/
class Gstimport extends Model
{
    protected $fillable = ['bill_no', 'gst_amout', 'booking_month', 'payment_month'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Gstimport::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setGstAmoutAttribute($input)
    {
        $this->attributes['gst_amout'] = $input ? $input : null;
    }
    
}
