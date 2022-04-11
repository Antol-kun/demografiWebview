<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelKomponen extends Model
{
    use HasFactory;
   public $timestamps = false;
    protected $table = "tb_komponen_nilai";
    protected $fillable = [
        'id',
        'nama_komponen',
        'type',
        'bobot',
        'nip',
        'kode_mapel',
        'tahun',
        'semester',
        'created_at',
        'idkelompokkls',

    ];

}
