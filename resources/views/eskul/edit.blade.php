@extends('layouts.index')
@section('title_page', 'Edit Eskul')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Data Eskul</h5>
        </div>
        <div class="card-body">
            <form action="{{route('eskul.update', $eskul->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="gambar" class="form-label fw-bold">Gambar</label>
                    @if ($eskul->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $eskul->gambar) }}" width="120" class="img-thumbnail" alt="{{ $eskul->nama_eskul }}">
                        </div>
                    @endif
                    <input type="file" name="gambar" id="gambar"
                        class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti.</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_eskul" class="form-label">Nama Eskul</label>
                    <input type="text" name="nama_eskul" id="nama_eskul"  class="form-control @error('nama_eskul') is-invalid @enderror" value="{{old('nama_eskul', $eskul->nama_eskul)}}" required>
                    @error('nama_eskul')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pembina" class="form-label">Pembina</label>
                    <input type="text" name="pembina" id="pembina" class="form-control @error('pembina') is-invalid @enderror" value="{{old('pembina', $eskul->pembina)}}" required>
                    @error('pembina')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jadwal_latihan" class="form-label">Jadwal Latihan</label>
                    <input type="text" name="jadwal_latihan" id="jadwal_latihan" class="form-control @error('jadwal_latihan' ) is-invalid @enderror" value="{{old('jadwal_latihan', $eskul->jadwal_latihan)}}" required>
                    @error('jadwal_latihan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi' ) is-invalid @enderror"  rows="4" required>{{old('deskripsi', $eskul->deskripsi)}}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('eskul.index')}}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection