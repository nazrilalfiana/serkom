@extends('layouts.index')
@section('title_page', 'Galeri')
@section('content')
<div class="container-fluid px-4 ">
        <a href="{{route('galeri.create')}}" class="btn btn-success mb-3 mt-4">Tambah Galeri</a>

        <table class="table table-bordered align-middle  align-items-center text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $galeris as $galeri)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            @if ($galeri->kategori == 'video')
                                <video  width="150" height="100" controls class="rounded border">
                                    <source src="{{asset('storage/' . $galeri->file)}}" type="video/mp4">
                                        Browser kamu tidak mendukung pemutaran video
                                </video>
                            @else
                               <img src="{{ asset('storage/' . ltrim($galeri->file, '/')) }}" alt="{{ $galeri->judul }}" width="100" class="img-thumbnail">
                            @endif
                        </td>
                        <td>{{ $galeri->judul}}</td>
                        <td>{{ $galeri->kategori}}</td>
                        <td>{{$galeri->keterangan ?? '-'}}</td>
                        <td>
                            <a href="{{route('galeri.edit', $galeri->id)}}" class="btn btn-warning btn-sm text-white">
                                <i class="lni lni-pencil"></i>
                            </a>
                           <form action="{{route('galeri.destroy', $galeri->id)}}" method="POST" class="d-inline" onsubmit="return confirm('apakah anda yakin ingin mengahapus data ini')">
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
                        <td colspan="6" class="text-center">Belum Ada Data Galeri</td>
                    </tr>
                @endforelse
            </tbody>
        </table>    
    </div>
@endsection