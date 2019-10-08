<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditAction extends Model
{
    protected $fillable = [
        'data_before',
        'data_after'
    ];
}
