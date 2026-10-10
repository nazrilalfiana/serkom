@extends('layouts.index')
@section('title_page', 'Tambah Eskul')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tambah Data Eskull</h5>
        </div>
        <div class="card-body">
            <form action="{{route('eskul.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_eskul" class="form_label">Nama Eskul</label>
                    <input type="text" name="nama_eskul" id="nama_eskul" class="form-control @error('nama_eskul' ) is-invalid @enderror" value="{{old('nama_eskul')}}" required>
                    @error('nama_eskul')
                        <div class="invalid-feedback">{{$message}}</div>
                        
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="pembina" class="form_label">Pembina</label>
                    <select name="pembina" id="pembina" class="form-select @error('pembina') is-invalid @enderror" required>
                        @foreach ($gurus as $guru)
                            <option value="{{$guru->nama_guru ?? $guru->nama_guru}}" {{old('pembina') == ($guru->nama_guru ?? $guru->nama) ? 'selected' : ''}}>
                                {{$guru->nama_guru ?? $guru->nama}}
                            </option>
                        @endforeach
                    </select>
                    @error('pembina')
                        <div class="invalid-feedback">{{$message}}</div>
                        
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jadwal_latihan" class="form_label">Jadwal Latihan</label>
                    <input type="text" name="jadwal_latihan" id="jadwal_latihan" class="form-control @error('jadwal_latihan' ) is-invalid @enderror" value="{{old('jadwal_latihan')}}" required>
                    @error('jadwal_latihan')
                        <div class="invalid-feedback">{{$message}}</div>
                        
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form_label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi' ) is-invalid @enderror"  rows="4" required>{{old('deskripsi')}}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{$message}}</div>
                        
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label fw-bold">Gambar</label>
                    <input type="file" name="gambar" id="gambar"
                        class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Format: JPG, PNG, WEBP (maks 2MB). Boleh dikosongkan.</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('eskul.index')}}" class="btn btn-secondary">Batal</a>
                </div>

            </form>
            </form>

        </div>
    </div>
    
@endsection