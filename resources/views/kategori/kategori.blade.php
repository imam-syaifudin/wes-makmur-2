@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
            <table class="table">
                <a href="{{ url('kategori/create') }}" class="btn btn-success">Add Kategori</a>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Desc Kategori</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                  @foreach( $kategori as $kat)
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $kat->namaKategori }}</td>
                    <td>{{ $kat->descKategori }}</td>
                    <td>
                        <a href="{{ url('kategori/'.$kat->id.'/edit') }}" class="btn btn-outline-primary">Update</a>
                        <form action="{{ route('kategori.destroy',$kat->id) }}" class="d-inline-block" method="POST">
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
