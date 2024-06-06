<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Vehicle
 *
 * @property $id
 * @property $vehicle_company_id
 * @property $title
 * @property $description
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property VehicleCompany $vehicleCompany
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vehicle extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['vehicle_company_id','title','description','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehicleCompany()
    {
        return $this->hasOne('App\Models\VehicleCompany', 'id', 'vehicle_company_id');
    }
    

}
