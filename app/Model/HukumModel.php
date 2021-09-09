<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HukumModel extends Model
{
    protected $table = "hukum";
    protected $fillable = [
        'id',
        'jenis_pelanggaran',
        'keterangan',
        'created_at',
        'updated_at'
    ];
}
