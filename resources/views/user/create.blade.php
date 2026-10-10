@extends('layouts.index')
@section('Title_page', 'Tambah User')
@section('content')

    <link rel="stylesheet" href={{asset('assets/bootstrap/css/bootstrap.min.css')}}>
    <script src={{ asset('assets/bootstrap/js/bootstrap.min.js') }}></script>


    <div class="container mt-4 m-5 mx-auto" style="max-width: 600px">
        <h3>Tambah User</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($erors->all() as $erors)
                        <li>{{$erors}}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        <form action="{{route('user.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" required>

            </div>
            <div class="mb-3">
                <label for="password" class="form-control">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-control">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="Admin">admin</option>
                    <option value="Operator">operator</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{route('user.index')}}" class="btn btn-secondary">kembali</a>
        </form>
    </div>

 @endsection