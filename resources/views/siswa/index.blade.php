@extends('layouts.index')
@section('title_page', 'Siswa')
@section('content')
    <div class="container-fluid px-4 mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-30">
                    <div class="d-flex justify-content-between align-items-center mb-25 flex-wrap gap-2">
                        <h4 class="text-bold">Data Siswa</h4>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <form action="{{route('siswa.index')}}" method="GET" class="d-flex gap-2">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari NISN atau nama..." value="{{request('search')}}">
                                    <button class="btn btn-outline-success btn-sm" type="submit">
                                        <i class="lni lni-search-alt"></i> Cari
                                    </button>
                                </div>
                                @if (request('search'))
                                    <a href="{{route('siswa.index')}}" class="btn btn-outline-danger btn-sm">Reset</a>
                                @endif
                            </form>
                            <a href="{{route('siswa.create')}}" class="btn btn-success btn-sm">
                                <i class="lni lni-plus"></i> Tambah Siswa
                            </a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-20" role="alert">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-wrapper table-responsive">
                        <table class="table striped-table align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tahun Masuk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siswas as $siswa)
                                    <tr>
                                        <td>{{ $siswas->firstItem() + $loop->index }}</td>
                                        <td>{{ $siswa->nisn ?? '-' }}</td>
                                        <td>{{ $siswa->nama_siswa ?? '-' }}</td>
                                        <td>{{ $siswa->kelas->kelas ?? '-' }}</td>
                                        <td>{{ $siswa->jenis_kelamin ? ucfirst($siswa->jenis_kelamin) : '-' }}</td>
                                        <td>{{ $siswa->tahun_masuk ?? '-' }}</td>
                                        <td>
                                            <a href="{{route('siswa.edit', $siswa->id)}}" class="btn btn-warning btn-sm text-white">
                                                <i class="lni lni-pencil"></i>
                                            </a>
                                            <form action="{{route('siswa.destroy', $siswa->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
                                        <td colspan="7" class="text-center py-4 text-muted">Belum Ada Data Siswa</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3 d-flex justify-content-center">
                        {{ $siswas->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection