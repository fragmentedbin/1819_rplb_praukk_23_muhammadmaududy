<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventaris extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id_inventaris';
    public $timestamps = false;
    protected $fillable = [
        'kode_inventaris', 
        'nama_inventaris', 
        'keterangan_inventaris',
        'tanggal_register_inventaris',
        'jumlah_inventaris',
        'id_ruang',
        'id_jenis',
        'id_user',
        'img_inventaris'
    ];
}
