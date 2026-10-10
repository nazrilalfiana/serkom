@extends('layouts.index')
@section('title_page', 'Edit Berita')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="fw-bold">Edit Galeri</h5>
        </div>
        <div class="card-body">
            <form action="{{route('galeri.update', $galeri->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        <option value="foto" {{old('kategori') ==  'foto' ? 'selected' : ''}}>Foto</option>
                        <option value="video" {{old('kategori') ==  'video' ? 'selected' : ''}}>Video</option>
                    </select>
                    @error('judul')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                 <div class="mb-3">
                    <label for="judul" class="form-label fw-bold">judul</label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{old('judul', $galeri->judul)}}" >
                    @error('judul')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="judul" class="form-label fw-bold">keterangan</label>
                    <textarea  name="keterangan" id="judul" class="form-control @error('keterangan') is-invalid @enderror" >{{old('keterangan', $galeri->keterangan)}}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                 <div class="mb-3">
                    <label for="judul" class="form-label fw-bold">media Saat Ini</label>
                    <div class="mb-2">
                          @if ($galeri->kategori == 'video')
                                <video  width="150" height="100" controls class="rounded border">
                                    <source src="{{asset('storage/' . $galeri->file)}}" type="video/mp4">
                                        Browser kamu tidak mendukung pemutaran video
                                </video>
                            @else
                               <img src="{{ asset('storage/' . $galeri->file) }}" alt="{{ $galeri->judul }}" width="100" class="img-thumbnail">
                            @endif
                    </div>
                    <label for="file" class="form-label fw-bold">Ganti gambar <small class="text-muted">(biarkan kosong jika tidak ingin mengganti)</small></label>
                    <input type="file" name="file"  class="form-control @error('file') is-invalid @enderror" id="file" accept="image/*,video/*">
                    @error('judul')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="{{route('galeri.index')}}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
    
@endsection