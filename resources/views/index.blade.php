@extends('layouts.app')

@section('content')


<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        @foreach( $post as $a )
        <div class="col-4 d-flex justify-content-center mt-2">
            <div class="card bg-dark text-light" style="width: 24rem;">
                <img src="https://images.unsplash.com/photo-1585241936939-be4099591252?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" class="card-img-top" alt="..." height="200">
                <div class="card-body">
                  <h5 class="card-title">{{ $a->judul }}</h5>
                  <p class="card-text">{{ Str::limit($a->isi, 120) }}</p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item bg-dark text-light">Penulis : <span class="text-success" >{{ $a->user->name }}</span></li>
                  <li class="list-group-item bg-dark text-light">Tanggal : <span class="text-danger" >{{ $a->tanggalDibuat }}</span></li>
                  <li class="list-group-item bg-dark text-light">Kategori : <span class="text-warning" >{{ $a->kategori->namaKategori }}</span></li>
                </ul>
                <div class="card-body text-center">
                  <a href="{{ url('/post') }}" class="card-link btn btn-outline-primary shadow-sm px-4" style="border-radius: 20px;">Edit</a>
                  <a href="{{ url('/login') }}" class="card-link btn btn-outline-warning shadow-sm px-4" style="border-radius: 20px;">Login</a>
                  <a href="{{ url('post/view/'.$a->id) }}" class="card-link btn btn-outline-danger shadow-sm px-4" style="border-radius: 20px;">View</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>


@endsection