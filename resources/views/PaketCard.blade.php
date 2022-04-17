@extends("layout.template")
@section('title','COKE')
@section('content')
<div class="row">
    @foreach ($data as $datas )
    <div class="col-lg-4  d-flex align-items-stretch mt-3">
        <div class="course-item">
            <div class="card" style="width: 18rem;">
            <img src="{{ URL::to('/') }}/img/{{ $datas->foto_paket }}" class="justify-content-center" width="287" height="280" >
                <div class="card-body">
                <h5 class="card-title">{{ $datas->nama_paket }}  <br>
                <div class="mt-2">Rp.{{ $datas->harga_akhir }}</h5>
                <h5 class="mt-2"><del>Rp.{{ $datas->harga_awal }}</del></h5>
                <p class="card-text">
                    <ul class="list-group">
                        @foreach ($paket as $p)
                        @if($datas->id == $p->id)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $p->nama_produk }}
                            <span class="badge bg-primary rounded-pill"> {{ $p->jumlah }}</span>
                            </li>
                        @endif
                        @endforeach
                    </ul>
                </p>
                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
