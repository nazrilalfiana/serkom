@extends('layouts.public')
@section('title', 'Profil MI leuwiseeng')
@section('content')
    <div class="container py-5">
        @if ($profil)
            <div class="text-center mb-5">
                @if ($profil->logo && file_exists(public_path('assets/images/' . $profil->logo)))
                    <img src="{{ asset('assets/images/' . $profil->logo) }}" alt="Logo" height="90" class="mb-3">
                @endif
                <h2 class="fw-bold mb-1">{{ $profil->nama_sekolah }}</h2>
                <p class="text-secondary mb-0">NPSN: {{ $profil->npsn ?? '-' }}</p>
            </div>
            <div class="row g-4 mb-4">
                <div class="col-lg-6">
                    <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm border bg-light">
                        @if ($profil->foto && file_exists(public_path('assets/images/' . $profil->foto)))
                            <img src="{{ asset('assets/images/' . $profil->foto) }}" alt="Foto Sekolah" class="w-100 h-100 object-fit-cover">
                        @else
                            <div class="d-flex align-items-center justify-content-center text-muted">Belum Ada Foto</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        @if ($profil->foto_kepala_sekolah && file_exists(public_path('assets/images/' . $profil->foto_kepala_sekolah)))
                            <img src="{{ asset('assets/images/' . $profil->foto_kepala_sekolah) }}" alt="Kepala Sekolah"
                                 class="rounded-circle border" style="width: 90px; height: 90px; object-fit: cover;">
                        @else
                            <div class="rounded-circle border bg-light d-flex align-items-center justify-content-center text-muted"
                                 style="width: 90px; height: 90px;">
                                <i class="fa-solid fa-user fa-2x"></i>
                            </div>
                        @endif
                        <div>
                            <div class="fw-bold fs-5">{{ $profil->kepala_sekolah ?? '-' }}</div>
                            <small class="text-secondary">Kepala Sekolah</small>
                        </div>
                    </div>
                    <table class="table table-sm table-borderless mb-0">
                        <tr><th style="width: 160px">Tahun Berdiri</th><td>: {{ $profil->tahun_berdiri ?? '-' }}</td></tr>
                        <tr><th>Alamat</th><td>: {{ $profil->alamat ?? '-' }}</td></tr>
                        <tr><th>Kontak</th><td>: {{ $profil->kontak ?? '-' }}</td></tr>
                        <tr><th>Siswa</th><td>: {{ number_format($totalSiswa) }}</td></tr>
                        <tr><th>Guru</th><td>: {{ number_format($totalGuru) }}</td></tr>
                        <tr><th>Ekskul</th><td>: {{ number_format($totalEskul) }}</td></tr>
                    </table>
                </div>
            </div>

            @if ($profil->deskripsi)
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="fw-bold">Tentang Sekolah</h5>
                        <p class="mb-0 text-secondary" style="white-space: pre-line">{{ $profil->deskripsi }}</p>
                    </div>
                </div>
            @endif

            @if ($profil->visi_misi)
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold">Visi & Misi</h5>
                        <p class="mb-0 text-secondary" style="white-space: pre-line">{{ $profil->visi_misi }}</p>
                    </div>
                </div>
            @endif
        @else
            <p class="text-center text-secondary">Profil sekolah belum diisi.</p>
        @endif
    </div>
@endsection