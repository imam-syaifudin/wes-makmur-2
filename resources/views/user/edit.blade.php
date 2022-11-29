@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form action="{{ route('user.update',$user->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama User</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Kategori" name="nama" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Role</label>
                        <select class="form-select" aria-label="Default select example" name="role">
                            <option selected>Role</option> 
                            <option value="admin" @if( $user->role == 'admin') selected @endif>Admin</option>
                            <option value="editor" @if( $user->role == 'editor') selected @endif>Editor</option>
                            <option value="user" @if( $user->role == 'user') selected @endif>User</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
