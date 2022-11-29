@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
            <table class="table">
                <a href="{{ url('produk/create') }}" class="btn btn-success">Add Product</a>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Desc Produk</th>
                    @if( auth()->user()->role == 'admin' )
                    <th scope="col">Disembunyikan</th>
                    @endif
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                  @foreach( $produk as $kat)
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $kat->namaProduk }}</td>
                    <td>{{ $kat->kategori->namaKategori }}</td>
                    <td><img src="storage/{{ $kat->foto }}". alt="" width="200"></td>
                    <td>{{ $kat->harga }}</td>
                    <td>{{ $kat->descProduk }}</td>
                    @if( auth()->user()->role == 'admin')
                    <td><span class="{{ $kat->hidden == 0 ? 'text-danger' : 'text-success' }}">{{ $kat->hidden === 0 ? 'no' : 'yes' }}<span></td>
                    @endif
                    <td>
                        <a href="{{ url('produk/'.$kat->id.'/edit') }}" class="btn btn-outline-primary">Update</a>
                        @if( auth()->user()->role == 'admin')
                        <a href="{{ url('produk/hide/'.$kat->id) }}" class="btn btn-outline-secondary">{{ $kat->hidden == 0 ? 'Hide Produk' : 'Unhide Produk' }}</a>
                        @endif
                        <form action="{{ route('produk.destroy',$kat->id) }}" class="d-inline-block" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger">Delete</a>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

        </div>
    </div>
</div>
@endsection
