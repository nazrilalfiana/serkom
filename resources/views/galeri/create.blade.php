@extends('layouts.index')
@section('title_page', 'Tambah Galeri')
@section('content')
    <form action="{{route('galeri.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label fw-bold">Judul Galeri</label>
            <input type="text" name="judul" id="" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label fw-bold">Kategori</label>
            <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required onchange="toggleFileInput()">
                <option value="foto" {{old('kategori') ==  'foto' ? 'selected' : ''}}>Foto</option>
                <option value="video" {{old('kategori') ==  'video' ? 'selected' : ''}}>Video</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label fw-bold">Keterangan</label>
            <textarea  name="keterangan" id="" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label fw-bold">Gambar</label>
            <input type="file" name="file" id="file_input" class="form-control" accept="image/*,video/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Galeri</button>
    </form>

@endsection