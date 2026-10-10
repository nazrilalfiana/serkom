@extends('layouts.public')
@section('title', 'Galeri MI Leuwiseeng')
@section('content')
    <div class="container py-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold mb-1">Galeri</h2>
            <p class="text-secondary mb-3">Dokumentasi kegiatan MI Leuwiseeng</p>

            <div class="btn-group">
                <a href="{{ route('landing.galeri') }}"
                   class="btn btn-sm {{ !$kategori ? 'btn-success' : 'btn-outline-success' }}">Semua</a>
                <a href="{{ route('landing.galeri', ['kategori' => 'foto']) }}"
                   class="btn btn-sm {{ $kategori == 'foto' ? 'btn-success' : 'btn-outline-success' }}">Foto</a>
                <a href="{{ route('landing.galeri', ['kategori' => 'video']) }}"
                   class="btn btn-sm {{ $kategori == 'video' ? 'btn-success' : 'btn-outline-success' }}">Video</a>
            </div>
        </div>



        <div class="row g-3">
            @forelse ($galeris as $galeri)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm overflow-hidden">
                        <div class="ratio ratio-4x3 bg-dark">
                            @if ($galeri->kategori == 'video')
                                <video src="{{ asset('storage/' . $galeri->file) }}" controls preload="metadata"
                                       class="w-100 h-100 object-fit-cover"></video>
                            @else
                                <img src="{{ asset('storage/' . $galeri->file) }}" alt="{{ $galeri->judul }}"
                                     class="w-100 h-100 object-fit-cover" loading="lazy">
                            @endif
                        </div>
                        <div class="card-body p-2">
                            <div class="fw-bold small text-truncate">{{ $galeri->judul }}</div>
                            @if ($galeri->keterangan)
                                <small class="text-secondary d-block text-truncate">{{ $galeri->keterangan }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-secondary">Belum ada galeri.</div>
            @endforelse
        </div>


        
        <div class="mt-4 d-flex justify-content-center">
            {{ $galeris->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection