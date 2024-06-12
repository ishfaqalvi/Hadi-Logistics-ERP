<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class JobPassportCheck
 *
 * @property $id
 * @property $job_id
 * @property $passport_check_id
 * @property $checked
 * @property $description
 *
 * @property Job $job
 * @property PassportCheck $passportCheck
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JobPassportCheck extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['job_id','passport_check_id','checked','description'];


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
    public function passportCheck()
    {
        return $this->hasOne('App\Models\PassportCheck', 'id', 'passport_check_id');
    }
    

}
