<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class JobesPassportCheck
 *
 * @property $id
 * @property $jobe_id
 * @property $passport_check_id
 * @property $checked
 * @property $description
 *
 * @property Jobe $jobe
 * @property PassportCheck $passportCheck
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JobesPassportCheck extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['jobe_id','passport_check_id','checked','description'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jobe()
    {
        return $this->hasOne('App\Models\Jobe', 'id', 'jobe_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function passportCheck()
    {
        return $this->hasOne('App\Models\PassportCheck', 'id', 'passport_check_id');
    }
    

}
