<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPinjaman extends Model
{
    public $table = 'detail_pinjaman';
    public $timestamps = false;
    protected $primaryKey = 'id_detail_pinjaman';
    protected $fillable = [
        'id_inventaris',
        'jumlah_pinjaman',
        'id_peminjaman',
    ];
}
