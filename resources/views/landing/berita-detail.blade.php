@extends('layouts.public')
@section('title', $berita->judul .'Berita Detail')
@section('content')


    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="{{ route('landing.berita') }}" class="text-decoration-none text-success">
                    <i class="fa-solid fa-arrow-left"></i> Semua berita
                </a>

                <h1 class="fw-bold mt-3">{{ $berita->judul }}</h1>
                <p class="text-secondary">
                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                </p>

                @if ($berita->gambar)
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                         class="img-fluid rounded shadow-sm mb-4 w-100">
                @endif

                <div style="white-space: pre-line;">{{ $berita->isi }}</div>
            </div>
        </div>

        @if ($lainnya->isNotEmpty())
            <hr class="my-5">
            <h5 class="fw-bold mb-3">Berita Lainnya</h5>
            <div class="row g-3">
                @foreach ($lainnya as $b)
                    <div class="col-md-4">
                        <a href="{{ route('landing.berita.detail', $b->id) }}" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <small class="text-secondary">
                                        {{ \Carbon\Carbon::parse($b->tanggal)->translatedFormat('d F Y') }}
                                    </small>
                                    <div class="fw-bold">{{ $b->judul }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                @endforeach
            </div>
        @endif

    </div>
@endsection