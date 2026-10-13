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

                          <div class="mb-3">
                            <label for="nama_guru" class="form-label fw-bold">Nama Guru <span class="text-danger">*</span></label>
                            <input type="text" name="nama_guru" id="nama_guru" required
                                value="{{ old('nama_guru') }}"
                                class="form-control @error('nama_guru') is-invalid @enderror">
                            @error('nama_guru')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                            <div class="mb-3">
                                <label for="nip" class="form-label fw-bold">NIP <span class="text-danger">*</span></label>
                                <input type="text" name="nip" id="nip" maxlength="30" required
                                    value="{{ old('nip') }}"
                                    class="form-control @error('nip') is-invalid @enderror">
                                @error('nip')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="mapel" class="form-label fw-bold">Mata Pelajaran</label>
                                <input type="text" name="mapel" id="mapel"
                                    value="{{ old('mapel') }}"
                                    class="form-control @error('mapel') is-invalid @enderror">
                                @error('mapel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label fw-bold">Foto</label>
                                <input type="file" name="foto" id="foto" accept="image/*"
                                    class="form-control @error('foto') is-invalid @enderror">
                                <small class="text-muted">Boleh dikosongkan. Maksimal 2 MB.</small>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
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