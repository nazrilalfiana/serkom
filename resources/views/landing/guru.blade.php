@extends('layouts.public')
@section('title', 'Daftar Guru - MI Leuwiseeng ')
@section('content')
    <div class="container py-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold mb-1">Guru dan Pembina</h2>
            <p class="text-secondary mb-0">Seluruh pendidik MI Leuwiseeng ({{ $gurus->count() }} orang)</p>
        </div>

        <div class="row g-4">
            @forelse ($gurus as $guru)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm text-center">
                        <div class="ratio ratio-1x1">
                            @if ($guru->foto && file_exists(public_path('assets/images/guru/' . $guru->foto)))
                                <img src="{{ asset('assets/images/guru/' . $guru->foto) }}" alt="Foto {{ $guru->nama_guru }}"
                                     loading="lazy" class="card-img-top w-100 object-fit-cover">
                            @else
                                <div class="bg-warning d-flex align-items-center justify-content-center display-3 fw-bold">
                                    {{ strtoupper(substr($guru->nama_guru, 0, 1)) }}
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="fw-bold">{{ $guru->nama_guru }}</div>
                            @if ($guru->mapel)
                                <small class="text-secondary d-block">Mapel: {{ $guru->mapel }}</small>
                            @endif
                            @if ($guru->nip)
                                <small class="text-secondary d-block">NIP: {{ $guru->nip }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-secondary">Belum ada data guru.</div>
            @endforelse
        </div>
    </div>
@endsection