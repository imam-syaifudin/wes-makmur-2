@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
            <table class="table">
                <a href="{{ url('post/create') }}" class="btn btn-success">Add Post</a>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Isi</th>
                    <th scope="col">Tanggal Dibuat</th>
                    <th scope="col">Penulis</th>
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
                  @foreach( $post as $kat)
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $kat->judul }}</td>
                    <td>{{ $kat->kategori->namaKategori }}</td>
                    <td>{{ $kat->isi }}</td>
                    <td>{{ $kat->tanggalDibuat }}</td>
                    <td>{{ $kat->user->name }}</td>
                    @if( auth()->user()->role == 'admin')
                    <td><span class="{{ $kat->hidden == 0 ? 'text-danger' : 'text-success' }}">{{ $kat->hidden === 0 ? 'no' : 'yes' }}<span></td>
                    @endif
                      <td>
                        <a href="{{ url('post/'.$kat->id.'/edit') }}" class="btn btn-outline-primary">Update</a>
                        @if( auth()->user()->role == 'admin')
                        <a href="{{ url('post/hide/'.$kat->id) }}" class="btn btn-outline-secondary">{{ $kat->hidden == 0 ? 'Hide Post' : 'Unhide Post' }}</a>
                        @endif
                        <form action="{{ route('post.destroy',$kat->id) }}" class="d-inline" method="POST">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-outline-danger">Delete</button>
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
