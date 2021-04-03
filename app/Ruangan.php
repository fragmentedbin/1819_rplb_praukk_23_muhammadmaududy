<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ruangan extends Model
{
    use SoftDeletes;

    public $table = 'ruangan';
    public $timestamps = false;
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id_ruangan' ;
    protected $fillable = [
        'nama_ruangan',
        'kode_ruangan',
        'keterangan_ruangan',
    ];
}
