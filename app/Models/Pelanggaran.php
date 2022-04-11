<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "tblpelanggaran";
    protected $fillable = [
        "nisn", "tgl_kejadian", "tempat_kejadian", "saksi", "kasus", "sanksi", "jenis_sanksi", "img_kasus"
    ];
}