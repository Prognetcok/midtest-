<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Pagination\paginator;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;
class Produk_Controller extends Controller
{
    public function Produk () {
        $data = Produk::join('tb_kategori','tb_produk.id_kategori','=','tb_kategori.id')
        ->select('tb_produk.*','tb_kategori.nama_kategori')->latest()->paginate(20);
        Paginator::useBootstrap();
        return view('produk.viewProduk',compact('data'));
    }

    public function addProduk () {
        $data = Kategori::all();
        return view('Produk.addProduk', compact('data'));
    }
    public function saveProduk (Request $request) {

        $request->validate([
            'id_kategori'=>'required',
            'produk'=>'required',
            'foto'=>'required|image|mimes:jepg,png,jpg|max:4096'
        ]);


        $image = $request->file('foto');
        $image_name = rand().".".$image->getClientOriginalExtension();
        $data = new Produk();
        $data -> id_kategori=$request->id_kategori;
        $data -> nama_produk=$request->produk;
        $data -> foto_produk=$image_name;
        $data->save();
        $image->move(public_path('img'),$image_name);
        return redirect('viewProduk');
    }

    public function editProduk (Request $request,$id) {
       $data = Produk::find($id);
       $datas = Kategori::all();
        //dd($data->foto_produk);
       return view('produk.editProduk', compact('data','datas'));
    }
    public function saveeditProduk (Request $request,$id) {

            $old_image_name = $request->hiden_image;
            // $data= $request->hiden_image;
            $image = $request->file('foto');

            if($image !=''){
                // dd($request->all());
                $request->validate([
                'id_kategori'=>'required',
                'produk'=>'required',
                'foto'=>'required|image|mimes:jepg,png,jpg|max:4096']);

                $image_name = $old_image_name;
                $image->move(public_path('img'),$image_name);

            }
            else{
                $request->validate([
                    'id_kategori'=>'required',
                    'produk'=>'required',
                    ]);
                $image_name = $old_image_name;
            }

            $data = Produk::find($id);
            $data->id_kategori=$request->id_kategori;
            $data->nama_produk=$request->produk;
            $data->foto_produk=$image_name;
            $data->update();

            return redirect('viewProduk');
    }
    public function deleteProduk($id){

        $data = Produk::find($id);
        $data->delete();
        return redirect('viewProduk');
    }
}
