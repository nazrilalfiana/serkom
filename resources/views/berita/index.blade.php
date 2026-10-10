@extends('layouts.index')
@section('title_page', 'Berita')
@section('content')
<div class="container-fluid px-4 mt-4">

    <a href="{{route('berita.create')}}" class="btn btn-success mb-3">Tambah Beritaa</a>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>
        </div> 
    @endif
    <table class="table table-bordered align-middle  align-items-center text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($beritas as $berita)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        @if ($berita->gambar)
                            <img src="{{asset('storage/' . $berita->gambar)}}" alt="{{$berita->judul}}" width="80" class="img-thumbnail">                            
                        @else
                            <span class="text-muted"></span>
                            
                        @endif
                    </td>
                    <td>{{$berita->judul}}</td>
                    <td>{{$berita->tanggal}}</td>
                    <td>
                        <span class="badge {{$berita->status == 'publis' ? 'bg-success' : 'bg-secondary'}}">
                            {{ ucfirst($berita->status)}}
                        </span>
                    </td>
                    <td>
                        <a href="{{route('berita.edit', $berita->id)}}" class="btn btn-warning btn-sm text-white">
                            <i class="lni lni-pencil"></i>
                        </a>
                       <form action="{{route('berita.destroy', $berita->id)}}" method="POST" class="d-inline" onsubmit="return confirm('apakah anda yakin ingin mengahapus data ini')">
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
                <td colspan="6" class="text-center">Belum Ada Data</td>
            </tr>
                
            @endforelse
        </tbody>

    </table>
</div>
@endsection