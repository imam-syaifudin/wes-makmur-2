@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form action="{{ route('post.update',$post->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Kategori" name="judul" value="{{ $post->judul }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Isi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi">{{ $post->isi }}</textarea>
                    </div>
                    <input type="hidden" value="{{ $post->tanggalDibuat }}" name="tanggalDibuat">
                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                    <select class="form-select" aria-label="Default select example" name="kategori_id">
                        <option selected>Kategori</option>
                        @foreach( $kategori as $kat )    
                        <option value="{{ $kat->id }}" @if( $kat->id == $post->kategori->id) selected @endif>{{ $kat->namaKategori }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
