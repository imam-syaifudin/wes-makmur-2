@extends('layouts.app')

@section('content')


<div class="container">
    
    <div class="row justify-content-center">
       <div class="col-lg-12">
        <div class="card text-center">
            <div class="card-header">
              Detail Post
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ $post->judul }}</h5>
              <p class="card-text">{{ $post->isi }}</p>
              <p class="card-text text-success">Penulis : {{ $post->user->name }}</p>
              <p class="card-text text-danger">Kategori : {{ $post->kategori->namaKategori }}</p>
              <a href="{{ url('/index') }}" class="btn btn-primary">Back Index</a>
            </div>
            <div class="card-footer text-muted">
              {{ $post->tanggalDibuat }}
            </div>
          </div>
       </div>
    </div>

    <div class="row mt-5">
        <h1 class="col-lg-12 text-center mb-5">Produk terkait</h1>
        @foreach( $produk as $p )
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/'.$p->foto) }}" class="card-img-top" alt="..." height="200">
                    <div class="card-body">
                      <h5 class="card-title">{{ $p->namaProduk }}</h5>
                      <p class="card-text">{{ $p->descProduk }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">{{ $p->harga }}</li>
                      <li class="list-group-item">{{ $p->kategori->namaKategori }}</li>
                      {{-- <li class="list-group-item">A third item</li> --}}
                    </ul>
                  </div>
            </div>
        @endforeach
    </div>

</div>


@endsection