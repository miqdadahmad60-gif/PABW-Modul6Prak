<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporans'; // atau 'laporan'

    protected $fillable = [
        'nama',
        'kecamatan',
        'desa',
        'tinggi_genangan'
    ];
}