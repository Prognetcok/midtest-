<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "tb_kategori";
    protected $primarykey = "id_kategori";
    protected $avilable = ['nama_kategori'];
}
