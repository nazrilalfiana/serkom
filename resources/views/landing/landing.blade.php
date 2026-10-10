@extends('layouts.public')
@section('title', 'Sistem Informasi Sekolah')
@section('content')


    <section class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <h1>Selamat Datang Di Sistem Informasi Sekolah MI LEUWISEENG</h1>
                <p class="lead text-secondary">
                    Kelola data siswa, kegiatan belajar, dan ekstrakulikuler dalam satu tempat.
                    Lebih rapi untuk guru, lebih jelas untuk siswa.
                </p>
                @if (Route::has('login'))
                    <div class="d-flex flex-wrap gap-2">
                        @auth
                            <a class="btn btn-success btn-lg" href="{{ url('/dashboard') }}">Buka Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-success btn-lg">Masuk Ke Akun</a>
                        @endauth
                    </div>
                @endif
            </div>
            <div class="col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white fw-bold">Jadwal Ekstrakulikuler</div>
                    <ul class="list-group list-group-flush">
                        @forelse ($eskuls as $eskul)
                            <li class="list-group-item d-flex justify-content-between align-items-center gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    @if ($eskul->gambar)
                                        <img src="{{ asset('storage/' . $eskul->gambar) }}" alt="{{ $eskul->nama_eskul }}"
                                            class="rounded" style="width: 48px; height: 48px; object-fit: cover;">
                                    @else
                                        <div class="rounded bg-light border d-flex align-items-center justify-content-center text-muted"
                                            style="width: 48px; height: 48px;">
                                            <i class="fa-solid fa-futbol"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="fw-bold">{{ $eskul->nama_eskul }}</div>
                                        <small class="text-secondary">{{ $eskul->pembina }}</small>
                                    </div>
                                </div>
                                <small class="text-secondary">Hari: {{ $eskul->jadwal_latihan }}</small>
                            </li>
                        @empty
                            <li class="list-group-item text-secondary">Belum Ada Ekstrakulikuler</li>
                        @endforelse
                    </ul>
                    <div class="card-footer bg-white text-center">
                        <a href="{{ route('landing.eskul') }}" class="btn btn-success btn-sm">
                            Lihat Semua Ekstrakulikuler <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-white border-top border-bottom py-5">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <div class="display-4 fw-bold text-success">{{ number_format($totalSiswa) }}</div>
                            <h5 class="fw-bold">Siswa Terdaftar</h5>
                            <p class="text-secondary mb-0">Data siswa terpusat dan mudah dicari</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <div class="display-4 fw-bold text-success">{{ number_format($totalGuru) }}</div>
                            <h5 class="fw-bold">Guru dan Pembina</h5>
                            <p class="text-secondary mb-0">Data guru lengkap dengan mata pelajaran</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <div class="display-4 fw-bold text-success">{{ number_format($totalEskul) }}</div>
                            <h5 class="fw-bold">Ekstrakulikuler Aktif</h5>
                            <p class="text-secondary mb-0">Pilihan eskul beserta pembina dan jadwalnya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @if ($profil)
        <section id="profil" class="py-5 bg-white border-top">
            <div class="container">
                <div class="text-center mb-4">
                    <h2 class="fw-bold mb-1">Profil Sekolah</h2>
                    <p class="text-secondary mb-0">Mengenal: {{ $profil->nama_sekolah }}</p>
                </div>
                <div class="row g-4 align-items-center">
                    <div class="col-lg-5">
                        <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm border bg-light">
                            @if ($profil->foto && file_exists(public_path('assets/images/' . $profil->foto)))
                                <img src="{{ asset('assets/images/' . $profil->foto) }}" alt="Foto Sekolah" class="w-100 h-100 object-fit-cover">
                            @else
                                <div class="d-flex align-items-center justify-content-center text-muted">Belum Ada Foto</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            @if ($profil->foto_kepala_sekolah && file_exists(public_path('assets/images/' . $profil->foto_kepala_sekolah)))
                                <img src="{{ asset('assets/images/' . $profil->foto_kepala_sekolah) }}" alt="Foto Kepala Sekolah"
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

                        <table class="table table-sm table-borderless mb-3">
                            <tr><th style="width: 160px">NPSN</th><td>: {{ $profil->npsn ?? '-' }}</td></tr>
                            <tr><th>Tahun Berdiri</th><td>: {{ $profil->tahun_berdiri ?? '-' }}</td></tr>
                            <tr><th>Alamat</th><td>: {{ $profil->alamat ?? '-' }}</td></tr>
                            <tr><th>Kontak</th><td>: {{ $profil->kontak ?? '-' }}</td></tr>
                            <tr><th>Deskripsi</th><td>: {{ $profil->deskripsi ?? '-' }}</td></tr>
                        </table>

                        @if ($profil->visi_misi)
                            <div class="card bg-white shadow-sm">
                                <div class="card-body">
                                    <h6 class="fw-bold">Visi & Misi</h6>
                                    <p class="mb-0 text-secondary" style="white-space: pre-line">{{ $profil->visi_misi }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="mt-3">
                            <a href="{{ route('landing.profil') }}" class="btn btn-success">
                                Lihat Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    @endif


    @if ($gurus->isNotEmpty())
        <section class="container py-5 text-center" id="guru">
            <h2 class="fw-bold mb-1">Guru Kami</h2>
            <p class="text-secondary mb-4">Pendidik yang mendampingi kegiatan belajar mengajar</p>

            <div class="row g-4">
                @foreach ($gurus as $guru)
                    <div class="col-6 col-md-3">
                        <div class="card h-100 shadow-sm">
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
                @endforeach
            </div>

            <div class="mt-4">
                <a href="{{ route('landing.guru') }}" class="btn btn-success">
                    Lihat Semua Guru <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </section>
    @endif


    @if ($beritas->isNotEmpty())
        <section class="bg-white border-top py-5" id="berita">
            <div class="container text-center">
                <h2 class="fw-bold mb-1">Berita Terbaru</h2>
                <p class="text-secondary mb-4">Kabar dan berita sekolah</p>
                <div class="row g-4">
                    @foreach ($beritas as $berita)
                        <div class="col-md-4">
                            <a href="{{route('landing.berita.detail', $berita->id)}}" class="text-decoration-none text-dark">

                                <div class="card h-100 shadow-sm">
                                    @if ($berita->gambar)
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                             class="card-img-top object-fit-cover" style="height: 200px;" loading="lazy">
                                    @endif
                                    <div class="card-body text-start">
                                        <small class="text-secondary">
                                            {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                                        </small>
                                        <h5 class="fw-bold mt-1">
                                            <a href="{{ route('landing.berita.detail', $berita->id) }}" class="text-decoration-none text-dark">
                                                {{ $berita->judul }}
                                            </a>
                                        </h5>
                                        <p class="text-secondary mb-0">{{ \Illuminate\Support\Str::limit($berita->isi, 100) }}</p>
                                    </div>
                                </div>

                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <a href="{{ route('landing.berita') }}" class="btn btn-success">
                        Lihat Semua Berita <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
    @endif

  
    @if ($galeris->isNotEmpty())
        <section id="galeri" class="container py-5">
            <div class="text-center mb-4">
                <h2 class="fw-bold mb-1">Galeri</h2>
                <p class="text-secondary mb-0">Dokumentasi kegiatan sekolah</p>
            </div>
            <div class="row g-3">
                @foreach ($galeris as $galeri)
                    <div class="col-6 col-md-3">
                        <div class="card h-100 shadow-sm overflow-hidden">
                            <div class="ratio ratio-4x3">
                                @if ($galeri->kategori == 'video')
                                    <video src="{{ asset('storage/' . $galeri->file) }}" controls class="w-100 h-100 object-fit-cover"></video>
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
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('landing.galeri') }}" class="btn btn-success">
                    Lihat Semua Galeri <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </section>
    @endif

@endsection