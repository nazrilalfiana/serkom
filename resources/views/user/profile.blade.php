@extends('layouts.index')
@section('title_page', 'Profile User')
@section('content')
<div class="container-fluid px-4 mt-4">

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Edir Profil User</h5>
                </div>
            </div>
            <div class="card-body">
                @if (session('berhasil'))
                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        {{session('berhasil')}}
                        <button type="button" class="btn--close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{route('user.updateProfile')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 mt-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username', $user->username)}}" required>
                        @error('username')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan password baru kalau mau menggantinya">
                        @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection