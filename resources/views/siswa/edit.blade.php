@extends('layouts.index')
@section('title_page', 'Edit Siswa')
@section('content')
    <div class="container-fluid m-5 mx-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-30">
                    <div class="d-flex justify-content-between align-items-center mb-25">
                        <h4 class="text-bold">Edit Siswa</h4>
                        <a href="{{route('siswa.index')}}" class="btn btn-secondary btn-sm">
                            <i class="lni lni-arrow-left"></i> Kembali
                        </a>
                    </div>
                    <form action="{{route('siswa.update', $siswa->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nama Siswa <span class="text-danger">*</span></label>
                                <input type="text" name="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror"
                                    value="{{ old('nama_siswa', $siswa->nama_siswa) }}" required>
                                @error('nama_siswa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">NISN <span class="text-danger">*</span></label>
                                <input type="text" name="nisn" maxlength="15" class="form-control @error('nisn') is-invalid @enderror"
                                    value="{{ old('nisn', $siswa->nisn) }}" required>
                                @error('nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Kelas <span class="text-danger">*</span></label>
                                <select name="kelas_id" required class="form-select @error('kelas_id') is-invalid @enderror">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id }}"
                                            {{ old('kelas_id', $siswa->kelas_id) == $k->id ? 'selected' : '' }}>
                                            {{ $k->kelas }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kelas_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jenis_kelamin" required class="form-select @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="">-- Pilih --</option>
                                    <option value="laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Tahun Masuk <span class="text-danger">*</span></label>
                                <input type="number" name="tahun_masuk" min="1900" max="2100"
                                    class="form-control @error('tahun_masuk') is-invalid @enderror"
                                    value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}" required>
                                @error('tahun_masuk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">
                            <i class="lni lni-save"></i> Perbarui Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection