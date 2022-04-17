@extends('layout.template')
@section('title', 'view')
@section('content')
<div class="btn-group" role="group" aria-label="Basic example">
    @csrf
    <a type="button" class="btn btn-outline-primary" href="{{ route('addKategori') }}"  method="post">Tambahkan</a>
</div>
<table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">Nama Kategori</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $datas)
        <tr>
            <td>{{ $datas->nama_kategori }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    @csrf
                    <a type="button" class="btn btn-outline-primary" href="{{ route('editKategori',$datas->id) }}"  method="post">Ubah</a>
                </div>
                <form action="{{ route('deleteKategori',$datas->id) }}" method='post' class='d-inline'onsubmit="return confirm('Apakah kamu yakin ingin menghapus Kategori ini ?')">
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
          </tr>
        @endforeach

  </table>
  <div class='mt-4 text-center'>
      showing
      {{ $data->firstItem() }}
      to
      {{ $data->lastItem() }}
  </div>
  <div>
      {{ $data->links() }}
  </div>
  @endsection
