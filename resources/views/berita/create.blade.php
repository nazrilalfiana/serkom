@extends('layouts.index')
@section('title_page', 'Tambah Berita')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tambah Data Berita</h5>
        </div>
        <div class="card-body">
            <form action="{{route('berita.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Berita</label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{old('judul')}}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{old('tanggal', date('Y-m-d'))}}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                   <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="draf" {{old('status') == 'draf' ? 'selected' : ''}}>Draf</option>
                        <option value="publis" {{old('status') == 'publis' ? 'selected' : ''}}>Publis</option>
                   </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi</label>
                    <textarea name="isi" id="isi"  rows="4" class="form-control @error('isi') is-invalid @enderror" required>{{old ('isi')}}</textarea>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" required>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="qbtn btn-primary">Simpan</button>
                    <a href="{{route('berita.index')}}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
    
@endsection