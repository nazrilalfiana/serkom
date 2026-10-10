@extends('layouts.index')
@section('title_page',   'Tambah Guru')
@section('content')
    <div class="container-fluid px-4 mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-30">
                    <div class="d-flex justify-content-between align-items-center mb-25">
                        <h4 class="text-bold">Data Guru</h4>
                        <div class="d-flex align-items-center gap-2">
                            <form action="{{route('guru.index')}}" method="GET" class="d-flex gap-2">
                                <div class="input-group">
                                    <input type="text" name="search" id="" class="form-control-sm" placeholder="Cari Nama Guru atau mapel..." value="{{request('search')}}">
                                    <button class="btn btn-outline-success btn-sm" type="submit">
                                        <i class="lni lni-search-alt"></i>Cari
                                    </button>  
                                </div>
                                @if (request('search'))
                                    <a href="{{route('guru.index')}}" class="btn btn-outline-danger btn-sm">
                                        Reset
                                    </a>
                                @endif
                            </form>
                            <a href="{{route('guru.create')}}" class="btn btn-success btn-sm">
                                <i class="lni lni-plus"></i>Tambah Guru
                            </a>
                        </div>
                        
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-20 " role="alert">
                        {{session('success')}}
                    </div>
                    @endif
                    <div class="table-wrapper table-resposive">
                        <table class="table striped-table align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Aksi</th>
                                </tr>

                            </thead>
                            <tbody>
                                @forelse ($gurus as $index => $guru)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>
                                            @if (!empty($guru->foto) && file_exists(public_path('assets/images/guru/' . $guru->foto)))
                                                <img src="{{asset('assets/images/guru/' .  $guru->foto)}}" alt="{{$guru->nama_guru}}" class="rounded-circle border" style="width: 55px; height: 55px; object-fit: cover;" > 
                                            @else
                                                <div class="bg-light rounded-circle  border d-flex align-items-center justify-content-center text-muted" style="width:45px; height: 45px;">
                                                    <small><i class="lni lni-user"></i></small>
                                                </div>
                                                
                                            @endif
                                        </td>
                                        <td>{{$guru->nip ?? '-'}}</td>
                                        <td><strong>{{$guru->nama_guru}}</strong></td>
                                        <td>{{$guru->mapel ?? '-'}}</td>
                                        <td>
                                            <a href="{{route('guru.edit', $guru->id)}}" class="btn btn-warning btn-sm text-white">
                                                <i class="lni lni-pencil"></i>
                                            </a>
                                            <form action="{{route('guru.destroy', $guru->id)}}" method="POST" class="d-inline" onsubmit="return confirm('apakah anda yakin ingin mengahapus data ini')">
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
                                    <td colspan="6" class="text-center py-4 text-muted">Belum Ada Data Guru</td>
                                </tr>
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection