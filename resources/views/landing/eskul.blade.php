@extends('layouts.public')
@section('title', 'Ekstrakulikuler MI leuwiseeng')
@section('content')
    <div class="container py-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold mb-1">Ekstrakulikuler</h2>
            <p class="text-secondary mb-0">Seluruh kegiatan ekstrakulikuler MI Leuwiseeng ({{ $eskuls->count() }} kegiatan)</p>
        </div>

        <div class="row g-4">
            @forelse ($eskuls as $eskul)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="ratio ratio-16x9 bg-light">
                            @if ($eskul->gambar)
                                <img src="{{ asset('storage/' . $eskul->gambar) }}" alt="{{ $eskul->nama_eskul }}"
                                     class="w-100 h-100 object-fit-cover" loading="lazy">
                            @else
                                <div class="d-flex align-items-center justify-content-center text-muted">
                                    <i class="fa-solid fa-futbol fa-3x"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="fw-bold">{{ $eskul->nama_eskul }}</h5>
                            <p class="text-secondary small mb-2">{{ $eskul->deskripsi }}</p>
                            <div class="small">
                                <div><i class="fa-solid fa-user me-1 text-success"></i> Pembina: {{ $eskul->pembina }}</div>
                                <div><i class="fa-solid fa-calendar-days me-1 text-success"></i> Jadwal: {{ $eskul->jadwal_latihan }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-secondary">Belum ada ekstrakulikuler.</div>
            @endforelse
        </div>
    </div>
@endsection