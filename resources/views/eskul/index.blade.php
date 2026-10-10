@extends('layouts.index')
@section('title_page', 'Eskul')
@section('content')
<div class="container-fluid px-4 mt-4">

    <a href="{{route('eskul.create')}}" class="btn btn-success mb-3">Tambah Eskul</a>
    @if (session('success'))
        <div class="alert alert-success alerst-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
    @endif
    <table class="table table-bordered align-items-center text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Eskul</th>
                <th>Pembina</th>
                <th>Jadwal Latihan</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($eskuls as $eskul)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        @if ($eskul->gambar)
                            <img src="{{ asset('storage/' . $eskul->gambar) }}" alt="{{ $eskul->nama_eskul }}" width="70" class="img-thumbnail">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{$eskul->nama_eskul}}</td>
                    <td>{{$eskul->pembina}}</td>
                    <td>{{$eskul->jadwal_latihan}}</td>
                    <td>{{$eskul->deskripsi}}</td>
                    <td>
                        <a href="{{route('eskul.edit', $eskul->id)}}" class="btn btn-warning btn-sm text-white">
                            <i class="lni lni-pencil"></i>
                        </a>
                       <form action="{{route('eskul.destroy', $eskul->id)}}" method="POST" class="d-inline" onsubmit="return confirm('apakah anda yakin ingin mengahapus data ini')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                 <i class="lni lni-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada ESKUL</td>
            </tr>
                
            @endforelse
        </tbody>
    </table>
</div>
    
@endsection