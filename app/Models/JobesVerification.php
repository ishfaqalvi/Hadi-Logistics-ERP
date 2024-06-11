<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class JobesVerification
 *
 * @property $id
 * @property $jobe_id
 * @property $verification_id
 * @property $value
 * @property $description
 *
 * @property Jobe $jobe
 * @property Verification $verification
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JobesVerification extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['jobe_id','verification_id','value','description'];


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
    public function verification()
    {
        return $this->hasOne('App\Models\Verification', 'id', 'verification_id');
    }
    

}
