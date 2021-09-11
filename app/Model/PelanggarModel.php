<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PelanggarModel extends Model
{
    protected $table = 'pelanggar';
    protected $fillable = [
        'id', 'nik', 'nama', 'tempat_lahir', 'tgl_lahir',
        'umur', 'gender', 'adat_id', 'created_at', 'updated_at'
    ];

    public function adat_rerol()
    {
        return $this->belongsTo(AdatModel::class, 'adat_id');
    }
}
