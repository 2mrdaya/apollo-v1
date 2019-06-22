<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EmailImport
 *
 * @package App
 * @property string $source
 * @property string $message
 * @property string $intimation_date_time
 * @property string $patient_name
 * @property string $referrer_name
*/
class EmailImport extends Model
{
    use SoftDeletes;

    protected $fillable = ['source', 'message', 'intimation_date_time', 'patient_name', 'referrer_name'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        EmailImport::observe(new \App\Observers\UserActionsObserver);
    }

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
    
}
