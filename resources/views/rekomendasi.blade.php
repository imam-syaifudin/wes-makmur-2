@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('rekomendasi/create') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keluhan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="keluhan">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Umur</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="umur">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        @isset( $data )
        <ul class="list-group mt-3">
            <li class="list-group-item">Nama Jamu : {{ $data['nama_jamu'] }}</li>
            <li class="list-group-item">Khasiat : {{ $data['khasiat'] }}</li>
            <li class="list-group-item">Keluhan : {{ $data['keluhan'] }}</li>
            <li class="list-group-item">Umur : {{ $data['umur'] }}</li>
            <li class="list-group-item">Saran Penggunaan : {{ $data['saran_penggunaan'] }}</li>
          </ul>
          @endisset
    </div>
</div>


@endsection