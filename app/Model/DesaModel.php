<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DesaModel extends Model
{
    protected $table = "desa";
    protected $fillable =[
        'id',
        'nama_desa',
        'lokasi',
        'created_at',
        'updated_at'
    ];
}
