<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SystemSetting
 *
 * @package App
 * @property string $code
 * @property string $description
 * @property text $value
*/
class SystemSetting extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'description', 'value'];
    protected $hidden = [];
    
    
    public static function boot()
    {
        parent::boot();

        SystemSetting::observe(new \App\Observers\UserActionsObserver);
    }
    
}
