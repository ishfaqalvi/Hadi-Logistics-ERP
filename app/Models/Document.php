<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Document
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
class Document extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;



    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'status', 'description', 'returnable'];

    /**
     * Scope for active vehicles.
     *
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function jobe()
    {
        return $this->belongsToMany(Jobe::class, 'documents_jobes', 'document_id', 'jobe_id')
            ->withPivot('submitted_at', 'attachment', 'submitted_remarks', 'returned_at', 'returned_remarks');
    }
}
