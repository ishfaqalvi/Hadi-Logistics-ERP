<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Expenditure
 *
 * @property $id
 * @property $office_id
 * @property $title
 * @property $type
 * @property $created_at
 * @property $updated_at
 *
 * @property Office $office
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Expenditure extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['office_id','title','type'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function office()
    {
        return $this->hasOne('App\Models\Office', 'id', 'office_id');
    }
    

}
