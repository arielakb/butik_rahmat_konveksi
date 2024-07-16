<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    protected $table = "tbl_supplier";
    protected $fillable =
    [
        'id_supplier',
        'nama_supplier',
        'kontak',
        'alamat',
    ];
    public $timestamps = false;
}