<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Verification
 *
 * @property $id
 * @property $title
 * @property $status
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Verification extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','status','description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jobVerification()
    {
        return $this->hasOne('App\Models\JobVerification', 'verification_id', 'id');
    }
}
