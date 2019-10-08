<?php

namespace App\Models;

use App\Events\DeleteNested;
use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Reddes\MappableModels\MappableModel;
use Reddes\MappableModels\Traits\HasNestedAttributes;

abstract class AbstractModel extends Model implements Auditable
{
    use HasNestedAttributes, SoftDeletes, Uuids, \OwenIt\Auditing\Auditable;

    protected $dates = ['deleted_at'];
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'deleting' => DeleteNested::class,
    ];

    //protected $dates = ['deleted_at'];
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The nested's (relations)
     *
     * @var array
     */
    public $nested = [];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'pivot'
    ];

    /**
     * Audit Relation
     * @return mixed
     */
    public function audit()
    {
        return $this->morphMany(AuditAction::class, 'object');
    }
}
