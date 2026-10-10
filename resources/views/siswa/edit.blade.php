@extends('layouts.index')
@section('title_page', 'Edit siswa')
@section('content')
    <div class="container-fluid m-5 mx-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-30">
                    <div class="d-flex justify-content-between align-items-center mb-25">
                        <h4 class="text-bold">Edit SIswa</h4>
                        <a href="{{route('siswa.index')}}" class="btn btn-secondary btn-sm">
                            <i class="lni lni-arrow-left"></i>kembali
                        </a>
                    </div>
                    <form action="{{route('siswa.update', $siswa->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label fw-bold">Nama Siswa</label>
                                <input type="text" name="nama_siswa" id="" class="form-control @error('nama_siswa') is-invalid @enderror" value="{{old('nama_siswa', $siswa->nama_siswa)}}" required>
                                @error('nama_siswa')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label fw-bold">NISN</label>
                                <input type="text" name="nisn" id="" class="form-control @error('nisn') is-invalid @enderror" value="{{old('nisn', $siswa->nisn)}}" >
                                @error('nisn')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label fw-bold">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="pilih jenis kelamin"></option>
                                    <option value="laki-laki" {{old('jenis_kelamin'== 'laki-laki' ? 'selected' : '')}}>laki-laki</option>
                                    <option value="perempuan" {{old('jenis_kelamin'== 'perempuan' ? 'selected' : '')}}>perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label fw-bold">Tahun Masuk</label>
                                <input type="text" name="tahun_masuk" id="" class="form-control @error('tahun_masuk') is-invalid @enderror" value="{{old('tahun_masuk', $siswa->tahun_masuk)}}" >
                                @error('tahun_masuk')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">
                            <i class="lni lni-save"></i>Perbaharui Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection