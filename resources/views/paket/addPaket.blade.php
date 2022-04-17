@extends('layout.template')
@section('title', 'edit')
@section('content')
<div class="container">
    <form action="{{ route('savePaket') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="paket" class="form-label">Nama Paket</label>
            <input type="text" class="form-control" id="paket" name="paket">
        </div>
        <div class="mb-3">
          <label for="harga_awal" class="form-label">Harga Awal</label>
          <input type="text" class="form-control"  id="harga_awal" name="harga_awal">
        </div>
        <div class="text-danger">
            @error('harga_awal')
              {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga_akhir" class="form-label">Harga Akhir</label>
            <input type="text" class="form-control" id="harga_akhir" name="harga_akhir">
          </div>
          <div class="text-danger">
              @error('harga_akhir')
                {{ $message }}
              @enderror
          </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Foto Paket</label>
            <input type="file" class="form-control mt-3 @error ('foto') is-invalid @enderror" id="foto" name="foto">
            <div class="text-danger">
              @error('id_kategori')
                {{ $message }}
              @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
