<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MessageMapping
 *
 * @package App
 * @property enum $channel
 * @property string $message
 * @property string $source
 * @property string $patient_name
 * @property string $referrer_name
 * @property string $intimation_date_time
 * @property string $uhid
 * @property string $avip
*/
class MessageMapping extends Model
{
    use SoftDeletes;

    protected $fillable = ['channel', 'message', 'source', 'patient_name', 'referrer_name', 'intimation_date_time', 'uhid_id', 'avip_id'];
    protected $hidden = [];


    public static function boot()
    {
        parent::boot();

        MessageMapping::observe(new \App\Observers\UserActionsObserver);
    }

    public static $enum_channel = ["Sms" => "Sms", "WhatsApp" => "WhatsApp", "Email" => "Email", "Other" => "Other"];

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setIntimationDateTimeAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['intimation_date_time'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['intimation_date_time'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getIntimationDateTimeAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUhidIdAttribute($input)
    {
        $this->attributes['uhid_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setAvipIdAttribute($input)
    {
        $this->attributes['avip_id'] = $input ? $input : null;
    }

    public function uhid()
    {
        return $this->belongsTo(PatientRegistration::class, 'uhid_id')->withTrashed();
    }

    public function avip()
    {
        return $this->belongsTo(Avip::class, 'avip_id')->withTrashed();
    }

}
