<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Databarang extends Model
{
    protected $guarded = [
        'id', 'created_at'
    ];

    protected $table = '_data_barang';
}
