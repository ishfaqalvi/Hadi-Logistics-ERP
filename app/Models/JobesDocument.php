<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class JobDocument
 *
 * @property $id
 * @property $jobe_id
 * @property $document_id
 * @property $submitted_at
 * @property $attachment
 * @property $submitted_remarks
 * @property $returned_at
 * @property $returned_remarks
 *
 * @property Document $document
 * @property Jobe $jobe
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JobesDocument extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;



    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['jobe_id', 'document_id', 'submitted_at', 'attachment', 'submitted_remarks', 'returned_at', 'returned_remarks'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function document()
    {
        return $this->hasOne('App\Models\Document', 'id', 'document_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jobe()
    {
        return $this->hasOne('App\Models\Jobe', 'id', 'jobe_id');
    }
}
