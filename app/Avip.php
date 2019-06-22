<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Avip
 *
 * @package App
 * @property string $name
 * @property string $address_1
 * @property string $address_2
 * @property string $bank_name
 * @property string $bank_address
 * @property string $account_no
 * @property string $swift_code
 * @property string $iban_number
 * @property string $bank_code
 * @property string $correspondence_bank_name
 * @property string $correspondence_ac_no
 * @property string $corp_swift_code
 * @property string $ifsc_code
 * @property string $pan_number
 * @property string $oracle_code
 * @property string $rate_details
 * @property string $state
 * @property integer $pin_code
*/
class Avip extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'address_1', 'address_2', 'bank_name', 'bank_address', 'account_no', 'swift_code', 'iban_number', 'bank_code', 'correspondence_bank_name', 'correspondence_ac_no', 'corp_swift_code', 'ifsc_code', 'pan_number', 'oracle_code', 'rate_details', 'state', 'pin_code'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        Avip::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPinCodeAttribute($input)
    {
        $this->attributes['pin_code'] = $input ? $input : null;
    }
    
    public function message_mappings() {
        return $this->hasMany(MessageMapping::class, 'avip_id');
    }
}
