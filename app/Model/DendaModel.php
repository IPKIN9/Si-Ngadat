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
        'created_at',
        'updated_at'
    ];
}
