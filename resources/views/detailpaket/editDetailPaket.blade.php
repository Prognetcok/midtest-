@extends('layout.template')
@section('title', 'edit')
@section('content')
<div class="container">
    <form action="{{ route('saveeditDetailPaket',$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
         <label for="paket" class="form-label">Paket</label>
         <select class="form-control" id="id_paket"  name="id_paket">
            @foreach($paket as $datas)
                <option value="{{ $datas->id }}">{{ $datas->nama_paket}} </option>
            @endforeach
         </select>
          <div class="text-danger">
            @error('id_paket')
              {{ $message }}
            @enderror
          </div>
          <label for="produk" class="form-label">Produk</label>
          <select class="form-control" id="id_produk"  name="id_produk">
            @foreach($produk as $p)
                <option value="{{ $p->id }}">{{ $p->nama_produk}} </option>
            @endforeach
          </select>
          <div class="text-danger">
            @error('id_produk')
              {{ $message }}
            @enderror
          </div>
          <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="text" class="form-control" value="{{ $data->jumlah }}" id="jumlah" name="jumlah">
          </div>
          <div class="text-danger">
              @error('jumlah')
                {{ $message }}
              @enderror
          </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
