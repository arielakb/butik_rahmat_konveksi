<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    protected $table = "tbl_pegawai";
    protected $fillable =
    [
        'id_pegawai',
        'nama_pegawai',
        'kontak_pegawai',
        'alamat_pegawai',
        'jenis_kelamin',
        'tggl_bekerja',
        'jabatan',
    ];
    public $timestamps = false;
}