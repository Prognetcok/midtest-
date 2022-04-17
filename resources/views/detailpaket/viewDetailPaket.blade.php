@extends('layout.template')
@section('title', 'view')
@section('content')
<div class="btn-group" role="group" aria-label="Basic example">
    @csrf
    <a type="button" class="btn btn-outline-primary" href="{{ route('addDetailPaket') }}"  method="post">Tambahkan</a>
</div>
<table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">nomor</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Nama Paket</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $datas)
        <tr>
            <th scope="row">{{ $loop-> index+1+($data->currentPage()-1)*5 }}</th>
            <td>{{ $datas->nama_produk }}</td>
            <td>{{ $datas->nama_paket }}</td>
            <td>{{ $datas->jumlah }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    @csrf
                    <a type="button" class="btn btn-outline-primary" href="{{ route('editDetailPaket',$datas->id) }}"  method="post">Ubah</a>
                </div>
                <form action="{{ route('deleteDetailPaket',$datas->id) }}" method='post' class='d-inline'onsubmit="return confirm('Apakah kamu yakin ingin menghapus Detail Paket ini ?')">
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
