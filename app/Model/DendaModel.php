<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DendaModel extends Model
{
    protected $table = 'denda';
    protected $fillable = [
        'id',
        'kode',
        'denda',
        'hukum_id',
        'desa_id',
        'created_at',
        'updated_at'
    ];

    public function hukum_rerol()
    {
        return $this->belongsTo(HukumModel::class, 'hukum_id');
    }
    public function desa_rerol()
    {
        return $this->belongsTo(DesaModel::class, 'desa_id');
    }
}
