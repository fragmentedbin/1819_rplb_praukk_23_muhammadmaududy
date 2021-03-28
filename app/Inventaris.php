<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventaris extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $primaryKey = 'id_inventaris';
    protected $dates = ['deleted_at'];
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
