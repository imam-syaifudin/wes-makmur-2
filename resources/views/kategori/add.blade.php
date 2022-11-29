@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Kategori" name="namaKategori">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Desc Kategori</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descKategori"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
