<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class JobVerification
 *
 * @property $id
 * @property $job_id
 * @property $verification_id
 * @property $value
 * @property $description
 *
 * @property Job $job
 * @property Verification $verification
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JobVerification extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['job_id','verification_id','value','description'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function job()
    {
        return $this->hasOne('App\Models\Job', 'id', 'job_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function verification()
    {
        return $this->hasOne('App\Models\Verification', 'id', 'verification_id');
    }
    

}
