<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdatModel extends Model
{
    protected $table = 'adat';
    protected $fillable = [
        'id', 'isi_perjanjian', 'keterangan', 'ttd',
        'desa_id', 'hukum_id', 'created_at', 'updated_at'
    ];

    public function user_rerol()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function desa_rerol()
    {
        return $this->belongsTo(DesaModel::class, 'desa_id');
    }
    public function hukum_rerol()
    {
        return $this->belongsTo(HukumModel::class, 'hukum_id');
    }
}
