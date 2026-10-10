@extends('layouts.index')
@section('title_page', 'Create Guru')
@section('content')
    <div class="container-fluid m-5 mx-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-30">
                    <div class="d-flex justify-content-between align-items-center mb-25">
                        <h4 class="text-bold">Tambah Data Guru</h4>
                        <a href="{{route('guru.index')}}" class="btn btn-secondary btn-sm">
                            <i class="lni lni-arrow-left"></i>Kembali
                        </a>
                    </div>
                    <form action="{{route('guru.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="" class="fw-bold form-label">Nama Guru</label>
                                <input type="text" name="nama_guru" id="" class="form-control @error('nama_guru') is-invalid @enderror" value="{{old('nama_guru')}}" placeholder="Masukan Nama lengkap" required>
                                @error('nama_guru')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label fw-bold">NIP</label>
                                <input type="text" name="nip" id="" class="form-control @error('nip') is-invalid @enderror" value="{{old('nip')}}" placeholder="Masukan nip">
                                @error('nip')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label fw-bold">Mata Pelajaran</label>
                                <input type="text" name="mapel" id="" class="form-control @error('mapel') is-invalid @enderror" value="{{old('mapel')}}" placeholder="Contoh matematika / bahasa.indonesia">
                                @error('mapel')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label fw-bold">Foto Guru</label>
                                <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                                <small class="text-muted">Format: JPG, PNG, WEBP (Maks: 2MB)</small>
                                @error('foto')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                            </div>

                        </div>
                        <button class="btn btn-primary mt-3" type="submit">
                            <i class="lni lni-save"></i> Simpan Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection