@extends('layout.template')
@section('title', 'edit')
@section('content')
<div class="container">
    <form action="{{ route('saveKategori') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="kategori" class="form-label">Kategori</label>
          <input type="text" class="form-control" id="kategori" name="kategori">
        </div>
        <div class="text-danger">
            @error('kategori')
              {{ $message }}
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </form>
</div>
@endsection
