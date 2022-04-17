<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Paket extends Model
{
    use HasFactory;
    protected $table = "tb_detail_paket";
    protected $primarykey = "id_detail_paket";
    protected $avilable = ['id_paket', 'id_produk', 'jumlah'];
}
