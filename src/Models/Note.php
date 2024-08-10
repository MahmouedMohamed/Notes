<?php

namespace Mahmoued\Notes\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Dyrynda\Database\Casts\EfficientUuid;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory, GeneratesUuid, SoftDeletes;

    public $fillable = [
        'text',
        'created_by',
    ];

    /**
     * The UUID version to use.
     *
     * @var int
     */
    protected $uuidVersion = 'uuid1';

    public function uuidColumn(): string
    {
        return 'uuid';
    }

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'uuid' => EfficientUuid::class,
        'created_by' => EfficientUuid::class
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'notable_type',
        'notable_id',
        'deleted_at',
    ];

    /**
     * Get the parent notable model.
     */
    public function notable(): MorphTo
    {
        return $this->morphTo();
    }
}
