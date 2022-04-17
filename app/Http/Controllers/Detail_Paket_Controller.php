<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail_Paket;
use App\Models\Produk;
use App\Models\Paket;
use Illuminate\Pagination\paginator;
class Detail_Paket_Controller extends Controller
{
    //
    public function DetailPaket () {
        $data = Detail_Paket::join('tb_produk','tb_produk.id','=','tb_detail_paket.id_produk')->join('tb_paket','tb_paket.id','=','tb_detail_paket.id_paket')
        ->select('tb_detail_paket.*','tb_produk.nama_produk','tb_paket.nama_paket')->latest()->paginate(50);
        Paginator::useBootstrap();
        return view('detailpaket.viewDetailPaket',compact('data'));
    }

    public function addDetailPaket () {
        $paket= Paket::all();
        $produk =Produk::all();
        return view('detailPaket.addDetailPaket',compact('paket','produk'));
    }
    public function saveDetailPaket (Request $request) {

        $request->validate([
            'id_paket'=>'required',
            'id_produk'=>'required',
            'jumlah'=>'required',
        ]);

        $data = new Detail_Paket();
        $data->id_paket=$request->id_paket;
        $data->id_produk=$request->id_produk;
        $data->jumlah=$request->jumlah;
        $data->save();

        return redirect('viewDetailPaket');
    }

    public function editDetailPaket (Request $request,$id) {
       $data = Detail_Paket::find($id);
       $paket= Paket::all();
       $produk =Produk::all();
       return view('detailpaket.editDetailPaket', compact('data','paket','produk'));
    }
    public function saveeditDetailPaket (Request $request,$id) {

        $request->validate([
            'id_paket'=>'required',
            'id_produk'=>'required',
            'jumlah'=>'required',
        ]);

        $data = Detail_Paket::find($id);
        $data->id_paket=$request->id_paket;
        $data->id_produk=$request->id_produk;
        $data->jumlah=$request->jumlah;
        $data->update();

        return redirect('viewDetailPaket');
    }
    public function deleteDetailPaket($id){

        $data = Detail_Paket::find($id);
        $data->delete();
        return redirect('viewDetailPaket');
    }
}
