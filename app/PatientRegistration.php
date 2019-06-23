<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PatientRegistration
 *
 * @package App
 * @property string $uhid
 * @property string $patient_name
 * @property string $registration_date
 * @property string $city
 * @property string $country
 * @property string $address
 * @property string $mobile
 * @property string $email_id
 * @property string $operator_name
*/
class PatientRegistration extends Model
{
    use SoftDeletes;

    protected $fillable = ['uhid', 'patient_name', 'registration_date', 'city', 'country', 'address', 'mobile', 'email_id', 'operator_name'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        PatientRegistration::observe(new \App\Observers\UserActionsObserver);
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
    
    public function message_mappings() {
        return $this->hasMany(MessageMapping::class, 'uhid_id');
    }
}
