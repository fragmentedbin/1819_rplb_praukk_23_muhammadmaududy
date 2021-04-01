<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_peminjam';
    public $table = "peminjam";
    Protected $fillable = [
        "nama_peminjam", "nip", "alamat",
    ];
}
