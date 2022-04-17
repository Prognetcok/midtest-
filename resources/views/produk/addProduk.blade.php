@extends('layout.template')
@section('title', 'view')
@section('content')
<div class="container">
    <form action="{{ route('saveProduk') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="produk" class="form-label">produk</label>
          <input type="text" class="form-control" id="produk" name="produk">
        </div>
        <div class="text-danger">
            @error('produk')
              {{ $message }}
            @enderror
          </div>
        <div class="mb-3">
            <label for="nama" class="form-label">kategori</label>
            {{-- <input type="text" class="form-control ps-0 form-control-line @error ('mobil') is-invalid @enderror" id="mobil" name="mobil"> --}}
            <select class="form-control" id="id_kategori"  name="id_kategori">
              @foreach($data as $datas)
                  <option value="{{ $datas->id }}">{{ $datas->nama_kategori}} </option>
              @endforeach
            </select>
            <div class="text-danger">
              @error('id_kategori')
                {{ $message }}
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <div class="form-group">
                <label for="foto">Gambar</label>
                <input type="file" class="form-control @error ('foto') is-invalid @enderror" id="foto" name="foto">
                <div class="text-danger">
                  @error('foto')
                    {{ $message }}
                  @enderror
                </div>
            </div>
            </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

  @endsection
