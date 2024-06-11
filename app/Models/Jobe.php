<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Jobe
 *
 * @property $id
 * @property $jobe_no
 * @property $customer_id
 * @property $vehicle_id
 * @property $vehicle_year
 * @property $vehicle_chasis
 * @property $consignee_id
 * @property $type
 * @property $notify
 * @property $shipping_line_name
 * @property $bl_no
 * @property $bl_date
 * @property $last_entry
 * @property $last_entry_to_bl_days
 * @property $collectortae
 * @property $shed_id
 * @property $vessel
 * @property $eta
 * @property $igm
 * @property $index
 * @property $created_at
 * @property $updated_at
 *
 * @property Consignee $consignee
 * @property Customer $customer
 * @property JobesDocument[] $JobesDocuments
 * @property JobesPassportCheck[] $jobesPassportChecks
 * @property JobesVerification[] $jobesVerifications
 * @property Shed $shed
 * @property Vehicle $vehicle
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Jobe extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;



    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['jobe_no', 'customer_id', 'vehicle_id', 'vehicle_year', 'vehicle_chasis', 'consignee_id', 'type', 'notify', 'shipping_line_name', 'bl_no', 'bl_date', 'last_entry', 'last_entry_to_bl_days', 'collectortae', 'shed_id', 'vessel', 'eta', 'igm', 'index'];


    /**
     * Boot method to increament in order.
     */
    protected static function booted()
    {
        static::creating(function ($jobe) {
            $highestOrder = static::max('id') + 1;
            $jobe->jobe_no = 'PSS-' . str_pad($highestOrder, 3, '0', STR_PAD_LEFT) . '-' . date('y');
        });
    }

    /**
     * Interact with the date.
     */
    public function getLastEntryAttribute($value)
    {
        return date('Y-m-d', $value);
    }

    /**
     * Interact with the date.
     */
    public function getEtaAttribute($value)
    {
        return date('Y-m-d', $value);
    }

    /**
     * Interact with the date.
     */
    public function getBlDateAttribute($value)
    {
        return date('Y-m-d', $value);
    }

    /**
     * Interact with the date.
     */
    public function setLastEntryAttribute($value)
    {
        $this->attributes['last_entry'] = strtotime($value);
        $this->attributes['last_entry_to_bl_days'] = Carbon::parse($value)->diffInDays(now());
    }

    /**
     * Interact with the date.
     */
    public function setBlDateAttribute($value)
    {
        $this->attributes['bl_date'] = strtotime($value);
    }

    /**
     * Interact with the date.
     */
    public function setEtaAttribute($value)
    {
        $this->attributes['eta'] = strtotime($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function consignee()
    {
        return $this->hasOne('App\Models\Consignee', 'id', 'consignee_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function JobesDocuments()
    {
        return $this->hasMany('App\Models\JobesDocument', 'jobe_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobesPassportChecks()
    {
        return $this->hasMany('App\Models\JobesPassportCheck', 'jobe_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobesVerifications()
    {
        return $this->hasMany('App\Models\JobesVerification', 'jobe_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shed()
    {
        return $this->hasOne('App\Models\Shed', 'id', 'shed_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehicle()
    {
        return $this->hasOne('App\Models\Vehicle', 'id', 'vehicle_id');
    }
}
