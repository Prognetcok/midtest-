<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Pagination\paginator;
class Kategori_Controller extends Controller
{
    //
    public function Kategori () {
        $data = Kategori::latest()->paginate(5);
        Paginator::useBootstrap();
        return view('kategori.viewKategori',compact('data'));
    }

    public function addKategori () {
        return view('kategori.addKategori');
    }
    public function saveKategori (Request $request) {

        $request->validate([
            'kategori'=>'required',
        ]);

        $data = new Kategori();
        $data -> nama_kategori=$request->kategori;
        $data->save();

        return redirect('viewKategori');
    }

    public function editKategori (Request $request,$id) {
       $data = Kategori::find($id);
        //dd($data->foto_produk);
       return view('kategori.editKategori', compact('data'));
    }
    public function saveeditKategori (Request $request,$id) {

        $request->validate([
        'kategori'=>'required',
        ]);

        $data = Kategori::find($id);
        $data->nama_kategori=$request->kategori;
        $data->update();

        return redirect('viewKategori');
    }
    public function deleteKategori($id){

        $data = Kategori::find($id);
        $data->delete();
        return redirect('viewKategori');
    }
}
