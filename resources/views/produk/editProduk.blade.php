@extends('layout.template')
@section('title', 'edit')
@section('content')
<div class="container">
    <form action="{{ route('saveeditProduk',$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="produk" class="form-label">produk</label>

          <input type="text" class="form-control" value="{{ $data->nama_produk }}" id="produk" name="produk">
        </div>
        <div class="text-danger">
            @error('produk')
              {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Gambar</label>
            <img src="{{ URL::to('/') }}/img/{{ $data->foto_produk }}" width="100" class="img-thumnail mt-2">
            <input type="hidden" class="form-control" id="hiden_image" name="hiden_image" value="{{ $data->foto_produk }}">
            <input type="file" class="form-control mt-3 @error ('foto') is-invalid @enderror" id="foto" name="foto">
            <div class="text-danger">
              @error('id_kategori')
                {{ $message }}
              @enderror
            </div>
        </div>

        <div class="mt-3">
            <label for="kategori" class="form-label">kategori</label>
            <select class="form-control" id="id_kategori" name="id_kategori">
                @foreach($datas as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_kategori}} </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </form>
</div>

  @endsection
