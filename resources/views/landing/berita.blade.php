@extends('layouts.public')

@section('title', 'Berita MI Leuwiseeng')
@section('content')
    <div class="container py-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold mb-1">Berita Sekolah</h2>
            <p class="text-secondary mb-0">Kabar dan berita terbaru MI Leuwiseeng</p>
        </div>

        <div class="row g-4">
            @forelse ($beritas as $berita)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        @if ($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                 class="card-img-top object-fit-cover" style="height: 200px;" loading="lazy">
                        @endif
                        <div class="card-body">
                            <small class="text-secondary">
                                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                            </small>
                            <h5 class="fw-bold mt-1">{{ $berita->judul }}</h5>
                            <p class="text-secondary">{{ \Illuminate\Support\Str::limit($berita->isi, 120) }}</p>
                            <a href="{{ route('landing.berita.detail', $berita->id) }}" class="btn btn-outline-success btn-sm">
                                Baca selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-secondary">Belum ada berita.</div>
            @endforelse

        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $beritas->links('pagination::bootstrap-5') }}
        </div>

        
    </div>
@endsection