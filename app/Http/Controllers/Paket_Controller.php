<?php

namespace App\Http\Controllers;

use App\Models\Detail_Paket;
use Illuminate\Http\Request;
use App\Models\Paket;
use Illuminate\Pagination\paginator;
class Paket_Controller extends Controller
{
    //
    public function Paket () {
        $data = Paket::latest()->paginate(5);
        Paginator::useBootstrap();
        return view('paket.viewPaket',compact('data'));
    }

    public function Produk2 () {
        // $data = Detail_Paket::join('tb_paket','tb_detail_paket.id_paket','=','tb_paket.id')
        // //->join('tb_produk','tb_detail_paket.id_produk','=','tb_produk.id')
        // ->select('tb_detail_paket.*','tb_paket.nama_paket','tb_paket.foto_paket')->get();
        $data = Paket::all();
        $paket = Paket::join('tb_detail_paket','tb_detail_paket.id_paket','=','tb_paket.id')
        ->join('tb_produk','tb_detail_paket.id_produk','=','tb_produk.id')
        ->select('tb_paket.*','tb_produk.nama_produk','tb_detail_paket.jumlah')->get();

        // Paginator::useBootstrap();
        return view('PaketCard',compact('data','paket'));
    }

    public function viewPaket() {
        $data = Paket::latest()->paginate(5);
        Paginator::useBootstrap();
        return view('paket.viewPaket',compact('data'));
    }

    public function addPaket () {
        return view('Paket.addPaket');
    }
    public function savePaket (Request $request) {

        $request->validate([
            'paket' =>'required',
            'harga_awal'=>'required',
            'harga_akhir'=>'required',
            'foto'=>'required|image|mimes:jepg,png,jpg|max:4096'
        ]);


        $image = $request->file('foto');
        $image_name = rand().".".$image->getClientOriginalExtension();
        $data = new Paket();
        $data->nama_paket=$request->paket;
        $data->harga_awal=$request->harga_akhir;
        $data->harga_akhir=$request->harga_awal;
        $data->foto_paket=$image_name;
        $data->save();
        $image->move(public_path('img'),$image_name);
        return redirect('viewPaket');
    }

    public function editPaket (Request $request,$id) {
       $data = Paket::find($id);
        //dd($data->foto_produk);
       return view('paket.editPaket', compact('data'));
    }
    public function saveeditPaket (Request $request,$id) {

            $old_image_name = $request->hiden_image;
            // $data= $request->hiden_image;
            $image = $request->file('foto');

            if($image !=''){
                // dd($request->all());
                $request->validate([
                'paket'=>'required',
                'harga_awal'=>'required',
                'harga_akhir'=>'required',
                'foto'=>'required|image|mimes:jepg,png,jpg|max:4096']);

                $image_name = $old_image_name;
                $image->move(public_path('img'),$image_name);

            }
            else{
                $request->validate([
                    'paket'=>'required',
                    'harga_awal'=>'required',
                    'harga_akhir'=>'required',
                    ]);
                $image_name = $old_image_name;
            }

            $data = Paket::find($id);
            $data->nama_paket=$request->paket;
            $data->harga_awal=$request->harga_awal;
            $data->harga_akhir=$request->harga_akhir;
            $data->foto_paket=$image_name;
            $data->update();

            return redirect('viewPaket');
    }
    public function deletePaket($id){

        $data = Paket::find($id);
        $data->delete();
        return redirect('viewPaket');
    }
}
