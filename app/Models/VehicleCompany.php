<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class VehicleCompany
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Vehicle[] $vehicles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VehicleCompany extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle', 'vehicle_company_id', 'id');
    }
    

}
