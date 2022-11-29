@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="namaProduk">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="exampleFormControlInput1" name="foto">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="harga">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Desc Produk</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descProduk"></textarea>
                    </div>
                    <select class="form-select" aria-label="Default select example" name="kategori_id">
                        <option selected>Kategori</option>
                        @foreach( $kategori as $kat )    
                        <option value="{{ $kat->id }}">{{ $kat->namaKategori }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-outline-success mt-2">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
