@extends('layouts.index')
@section('title_page', 'Dashboard')
@section('content')
<div class="container-fluid px-4">

    <div class="row mt-2">
        <div class="col-xl-4 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
                <div class="icon primary">
                    <i class="lni lni-users"></i>
                </div>
                <div class="cotent">
                    <h6 class="mb-10">Total User</h6>
                    <h3 class="text-bold">{{$totalUser ?? 0}}</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
                <div class="icon success">
                    <i class="lni lni-users"></i>
                </div>
                <div class="cotent">
                    <h6 class="mb-10">Admin</h6>
                    <h3 class="text-bold">{{$totalAdmin}}</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
                <div class="icon orange">
                    <i class="lni lni-users"></i>
                </div>
                <div class="cotent">
                    <h6 class="mb-10">Operator</h6>
                    <h3 class="text-bold">{{$totalOperator}}</h3>
                </div>
            </div>
        </div>
    </div>
    @php
        $stats = [
            [ 'label' => 'Siswa', 'jumlah' => $totalSiswa, 'warna' =>'primary', 'ikon' =>'lni-users', 'rute' =>'siswa.index'],
            [ 'label' => 'Guru', 'jumlah' => $totalGuru, 'warna' =>'success', 'ikon' =>'lni-users', 'rute' =>'guru.index'],
            [ 'label' => 'Eksul', 'jumlah' => $totalEskul, 'warna' =>'orange', 'ikon' =>'lni-library', 'rute' =>'eskul.index'],
            [ 'label' => 'Berita', 'jumlah' => $totalBerita, 'warna' =>'primary', 'ikon' =>'lni-bullhorn', 'rute' =>'berita.index'],
            [ 'label' => 'Galeri', 'jumlah' => $totalGaleri, 'warna' =>'success', 'ikon' =>'lni-image', 'rute' =>'galeri.index'],
    
        ]
    @endphp
    <div class="row">
        @foreach ($stats as $s)
            <div class="col-xl col-lg-4 col-sm-6">
                <a href="{{route($s['rute'])}}" class="text-decoration-none">
                    <div class="icon-card mb-30">
                        <div class="icon {{$s['warna']}}">
                            <i class="lni {{$s['ikon']}}"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">{{$s['label']}}</h6>
                            <h3 class="text-bold">{{number_format($s['jumlah'])}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            
        @endforeach
    </div>
    <div class="row">
        <div class="col-style mb-30">
            <div class="title d-flex justify-content-between align-items-center mb-20">
                <h6>Selamat Datang, {{Auth::user()->username ?? 'pengguna'}}!</h6>
            </div>
            <p class="text-sm text-gray">
                Anda berhasil login sebagai <strong>{{ucfirst(Auth::user()->role ?? 'User')}}</strong>. Gunakan menu di sebelah kiri untuk mengelola data user atau navigasi aplikasi
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-style mb-30">
                <h6 class="mb-3">Aksi Cepat</h6>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{route('berita.create')}}" class="btn btn-success btn-sm">+ Tulis Berita</a>
                    <a href="{{route('galeri.create')}}" class="btn btn-success btn-sm">+ Upload Galeri</a>
                    <a href="{{route('guru.create')}}" class="btn btn-success btn-sm">+ Tambah guru</a>
                    <a href="{{route('siswa.create')}}" class="btn btn-success btn-sm">+ Tulis siswa</a>
                    <a href="{{route('landing')}}" target="_blank" class="btn btn-success btn-sm">Lihat Website</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-style mb-30">
                <h6 class="mb-3">Berita Terbaru</h6>

                <table class="table">
                    <tbody>
                        @forelse ($beritaTerbaru as $b)
                            <tr>
                                <td>{{$b->judul}}</td>
                                <td class="text-end">
                                    <small class="text-muted">{{\Carbon\Carbon::parse($b->tanggal)->translatedFormat('d M Y')}}</small>
                                </td>


                            </tr>
                            @empty
                            <tr><td class="text-muted"></td></tr>
                            @endforelse
                        </tbody>
                        
                    </table>
                    <a href="{{route('berita.index')}}" class="btn btn-success btn-sm mt-4">Lihat Detail</a>
            </div>
        </div>
    </div>
</div>
    

    
@endsection