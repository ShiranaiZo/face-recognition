<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Riwayat extends Model
{
    use SoftDeletes;
    protected $guarded = [
        'id', 'created_at'
    ];
}
