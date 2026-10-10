@extends('layouts.index')
@section('title_page', 'Edit Berita')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Data Berita</h5>
        </div>
        <div class="card-body">
            <form action="{{route('berita.update', $berita->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{old ('judul', $berita->judul)}}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{old ('tanggal', $berita->tanggal)}}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                   <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="draf" {{old('status', $berita->status) == 'draf' ? 'selected' : ''}}>Draf</option>
                        <option value="publis" {{old('status', $berita->status) == 'publis' ? 'selected' : ''}}>Publis</option>
                   </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi</label>
                    <textarea type="text" name="isi" id="isi" class="form-control @error('isi') is-invalid @enderror" rows="4" required>{{old('isi', $berita->isi)}}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">{{ $message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">gambar</label>
                    <div class="mb-2">
                        @if ($berita->gambar)
                            <img src="{{asset('storage/' . $berita->gambar)}}" alt="{{$berita->judul}}" width="150" class="img-thumbnail">
                        @else
                            <p class="text-muted">Tidak Ada Gambar</p>
                        @endif
                    </div>
                    <label for="gambar" class="form-label" >Ganti gambar <small class="text-muted">(Biarkan kosong jika tidak mengganti)</small></label>
                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    @error('gambar')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="{{route('berita.index')}}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
    
@endsection