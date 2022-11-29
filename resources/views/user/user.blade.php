@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
            <table class="table">
                <a href="{{ url('/register') }}" class="btn btn-success">Add User</a>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Role</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                  @foreach( $user as $kat)
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $kat->name }}</td>
                    <td>{{ $kat->role }}</td>
                    <td>
                        <a href="{{ url('user/'.$kat->id.'/edit') }}" class="btn btn-outline-primary">Update</a>
                        <form action="{{ route('user.destroy',$kat->id) }}" class="d-inline-block" method="POST">
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
