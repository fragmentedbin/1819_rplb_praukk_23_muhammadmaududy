<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'kode_inventaris', 
        'nama_inventaris', 
        'keterangan_inventaris',
        'tanggal_register_inventaris',
        'jumlah_inventaris',
        'id_ruang',
        'id_jenis',
        'id_user'

    ];
}
