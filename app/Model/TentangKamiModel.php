<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TentangKamiModel extends Model
{
    protected $table = "tentang_kami";
    protected $fillable =[
        'id',
        'email',
        'telepon',
        'alamat',
        'deskripsi',
        'created_at',
        'updated_at'
    ];
}
