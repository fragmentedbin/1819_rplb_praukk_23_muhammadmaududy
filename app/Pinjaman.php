<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    public $table = 'peminjaman';
    public $timestamps = false;
    protected $primaryKey = 'id_peminjaman' ;
    protected $fillable = [
        'id_inventaris',
        'jumlah_pinjaman',
        'tanggal_peminjaman',
        'tanggal_kembali',
        'tanggal_dikembalikan',
        'status_peminjaman',
        'approval',
        'id_peminjam',
    ];
}
