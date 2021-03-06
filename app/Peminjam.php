<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Peminjam extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    public $table = "peminjam";
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id_peminjam';
    Protected $fillable = [
        "nama_peminjam", "nip", "alamat",
    ];
}
