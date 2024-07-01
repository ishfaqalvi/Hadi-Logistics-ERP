<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class JobDocument
 *
 * @property $id
 * @property $job_id
 * @property $document_id
 * @property $submitted_at
 * @property $attachment
 * @property $submitted_remarks
 * @property $returned_at
 * @property $returned_remarks
 *
 * @property Document $document
 * @property Job $job
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JobDocument extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['job_id', 'document_id', 'submitted_at', 'attachment', 'submitted_remarks', 'returned_at', 'returned_remarks'];

    /**
     * Interact with the date.
     */
    public function getSubmittedAtAttribute($value)
    {
        return date('Y-m-d', $value);
    }

    /**
     * Interact with the date.
     */
    public function getReturnedAtAttribute($value)
    {
        return date('Y-m-d', $value);
    }

    /**
     * Interact with the date.
     */
    public function setSubmittedAtAttribute($value)
    {
        $this->attributes['submitted_at'] = strtotime($value);
    }

    /**
     * Interact with the date.
     */
    public function setReturnedAtAttribute($value)
    {
        $this->attributes['returned_at'] = strtotime($value);
    }

    /**
     * Set the image.
     * @param string $value
     * @return void
     */
    public function setAttachmentAttribute($attachment)
    {
        if ($attachment) {
            $name = time() . '_' . $attachment->getClientOriginalName();
            $attachment->move('upload/documents/', $name);
            $this->attributes['attachment'] = $name;
        } else {
            unset($this->attributes['attachment']);
        }
    }

    /**
     * Get the image.
     * @param string $value
     * @return string
     */
    public function getAttachmentAttribute($image)
    {
        return asset('/upload/documents/' . $image);
    }

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
    public function job()
    {
        return $this->hasOne('App\Models\Job', 'id', 'job_id');
    }
}
