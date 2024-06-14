<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Office
 *
 * @property $id
 * @property $title
 * @property $created_at
 * @property $updated_at
 *
 * @property Expenditure[] $expenditures
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Office extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function expenditures()
    {
        return $this->hasMany('App\Models\Expenditure', 'office_id', 'id');
    }
    

}
