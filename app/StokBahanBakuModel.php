<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokBahanBakuModel extends Model
{
    protected $table = "tbl_stok_bahan_baku";
    protected $fillable =
    [
        'id_loker_bahan',
        'nama_vendor',
        'nama_loker_bahan',
        'nama_bahan_baku',
        'merk_bahan_baku',
        'jenis_bahan_baku',
        'warna_bahan',
        'qty_bahan',
        'penanggung_jawab',
        'tgl_pemeriksaan_bahan'
    ];
    public $timestamps = false;
}