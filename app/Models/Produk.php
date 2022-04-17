<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = "tb_produk";
    protected $primarykey = "id_produk";
    protected $avilable = ['id_kategori', 'nama_produk', 'foto_produk'];
}
