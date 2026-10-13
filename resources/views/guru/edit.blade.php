@extends('layouts.index')
@section('title_page', 'Edit Guru')
@section('content')
    <div class="container-fluid ms-5 mx-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-30">
                    <div class="d-flex justify-content-between align-items-center mb-25">
                        <h4 class="text-bold">Edit Data Guru</h4>
                        <a href="{{route('guru.index')}}" class="btn btn-secondary btn-sm">
                            <i class="lni lni-arrow-left"></i> Kembali
                        </a>
                    </div>
                    <form action="{{route('guru.update', $guru->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama_guru" class="form-label fw-bold">Nama Guru <span class="text-danger">*</span></label>
                                <input type="text" name="nama_guru" id="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror" value="{{old('nama_guru', $guru->nama_guru)}}" required>
                                @error('nama_guru') <div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="nip" class="form-label fw-bold">NIP <span class="text-danger">*</span></label>
                                <input type="text" name="nip" id="nip" maxlength="30" class="form-control @error('nip') is-invalid @enderror" value="{{old('nip', $guru->nip)}}" required>
                                @error('nip') <div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="mapel" class="form-label fw-bold">Mata Pelajaran</label>
                                <input type="text" name="mapel" id="mapel" class="form-control @error('mapel') is-invalid @enderror" value="{{old('mapel', $guru->mapel)}}">
                                @error('mapel') <div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="foto" class="form-label fw-bold">Foto Guru</label>
                                @if ($guru->foto && file_exists(public_path('assets/images/guru/' . $guru->foto)))
                                    <div class="mb-2">
                                        <img src="{{asset('assets/images/guru/' . $guru->foto)}}" width="100" class="img-thumbnail" alt="{{$guru->nama_guru}}">
                                    </div>
                                @endif
                                <input type="file" name="foto" id="foto" accept="image/*" class="form-control @error('foto') is-invalid @enderror">
                                <small class="text-muted">* Biarkan kosong jika tidak mengubah foto</small>
                                @error('foto') <div class="invalid-feedback">{{$message}}</div> @enderror
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