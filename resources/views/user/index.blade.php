@extends('layouts.index')
@section('title_page', 'User')
<link rel="stylesheet" href={{asset('assets/bootstrap/css/bootstrap.min.css')}}>
<script src={{ asset('assets/bootstrap/js/bootstrap.min.js') }}></script>
@section('content')
        <div class="container-fluid px-4">

            <h1>Data User</h1>
            @if (auth()->check() && auth()->user()->role == 'Admin')
                <a href="{{route('user.create')}}" class="btn btn-success btn-sm">
                    <i class="lni lni-pencil"></i> Tambah User
                </a>
                
            @endif
            @if(@session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                </div>
            @endif
            <table class="table table-bordered m-5 mx-auto text-center">
                <thead class="table-dark">
                    <tr>
                        <th width='50px'>No</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th width='180px'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $user)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$user -> username}}</td>
                            <td><span class="badge bg-success text-dark">{{ $user->role}}</span></td>
                            <td>
                                <a href="{{route('user.edit', $user->id)}}" class="btn btn-warning btn-sm"><i class="lni lni-pencil"></i></a>
                                @if (auth()->user()->role == 'Admin' && auth()->id() !== $user->id)
                                    <button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#resetModal{{$user->id}}" title="Reset Password">
                                        <i class="lni lni-key"></i>
                                    </button>
                                @endif
        
                                <form action="{{route('user.destroy', $user->id)}}" method="POST" class="d-inline" onsubmit="return confirm('yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="lni lni-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data user</td>
                            </tr>
                            
                        @endforelse
                </tbody>
            </table>
            @if (auth()->user()->role == 'Admin')
                @foreach ($users as $user)
                    @if (auth()->id() !== $user->id)
                        
                    <div class="modal fade" id="resetModal{{$user->id}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{route('user.reset-password', $user->id)}}" method="POST" class="modal-content">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Reset Password: {{$user->username}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="form-label fw-bold">Password Baru</label>
                                        <input type="password" name="password"  class="form-control" required minlength="8">
                                    </div>
                                    <div class="mb-3">
                                        <label for="form-label fw-bold">Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation"  class="form-control" required minlength="8">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    
                @endforeach
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">{{$errors->first()}}</div>
            @endif
        </div>

 @endsection