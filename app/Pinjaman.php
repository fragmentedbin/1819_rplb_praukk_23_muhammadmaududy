<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pinjaman extends Model
{
    use SoftDeletes;

    public $table = 'peminjaman';
    public $timestamps = false;
    protected $dates = ['deleted_at'];
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
