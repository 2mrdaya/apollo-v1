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
*/
class PpnPayment extends Model
{
    use SoftDeletes;

    protected $fillable = ['month', 'patientid_id', 'avipid_id'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        PpnPayment::observe(new \App\Observers\UserActionsObserver);
    }

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
    
    public function patientid()
    {
        return $this->belongsTo(Ip::class, 'patientid_id')->withTrashed();
    }
    
    public function avipid()
    {
        return $this->belongsTo(Avip::class, 'avipid_id')->withTrashed();
    }
    
}
