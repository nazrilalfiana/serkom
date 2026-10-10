@extends('layouts.index')
@section('title_page', 'Edit Profil')
@section('content')
    <div class="container-fluid m-5 mx-auto">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card-style mb-30">
                    <h4 class="mb25"> Edit Profil Sekolah</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger py-2 mb-3">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all( ) as $eror)
                                    <li><small>{{$eror}}</small></li>
                                @endforeach
                            </ul>
                        </div>
                        
                    @endif
                    <form action="{{route('profil.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label fw-bold">Logo Sekolah</label>
                                <input type="file" name="logo" class="form-control" accept="images/*">
                                <small class="text-muted">Format: JPG, PNG,  GIF (Maks:2)</small>
                                @if ((!empty($profil->logo )  && file_exists(public_path('assets/images/' . $profil->logo))))
                                    <div class="mt-2">
                                        <small class="d-block text-muted mb-1">Logo Saat Ini:</small>
                                        <img src="{{asset('assets/images/' . $profil->logo)}}" alt="Logo saat ini" style="max-height: 80px;" class="border p-1 rounded">
                                    </div>
                                @endif
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label fw-bold">Foto Sekolah</label>
                                @if (!empty($profil->foto) && file_exists(public_path('assets/images/' .  $profil->foto)))
                                    <div class="mb-2">
                                        <img src="{{asset('assets/images/'. $profil->foto)}}" alt="foto saat ini" style="max-width: 100px;" class="rounded border">
                                    </div>
                                @endif
                                <input type="file" name="foto" class="form-control" accept="image/*">
                                <small class="text-muted">Biarkan kosong jika ingin mengubah foto. format: JPG, PNG WEBP (MAX: 2MB)</small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="foto_kepala_sekolah" class="form-label fw-bold">Foto kepala Sekolah</label>
                                 @if (!empty($profil->foto_kepala_sekolah) && file_exists(public_path('assets/images/' .  $profil->foto_kepala_sekolah)))
                                    <div class="mb-2">
                                        <img src="{{asset('assets/images/'. $profil->foto_kepala_sekolah)}}" alt="foto saat ini" style="max-width: 100px;" class="rounded border">
                                    </div>
                                @endif
                                <input type="file" name="foto_kepala_sekolah" class="form-control" accept="image/*">
                                <small class="text-muted">Biarkan kosong jika ingin mengubah foto. format: JPG, PNG WEBP (MAX: 2MB)</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label fw-bold" >Nama Sekolah <span class="text-danger">*</span></label>
                                <input type="text" name="nama_sekolah" class="form-control" value="{{old('nama_sekolah', $profil->nama_sekolah ?? '')}}" required>

                            </div>

                            
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label fw-bold">Kepala Sekolah</label>
                                <input type="text " name="kepala_sekolah" class="form-control" value="{{old('kepala_sekolah', $profil->kepala_sekolah ?? '')}}" required>
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="" class="form-label fw-bold">NPSN</label>
                                <input type="text" name="npsn" class="form-control" value="{{old('npsn', $profil->npsn ?? '')}}" required>
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="" class="form-label fw-bold">Kontak</label>
                                <input type="text" name="kontak" class="form-control" value="{{old('kontak', $profil->kontak ?? '')}}">
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="" class="form-label fw-bold">Tahun Berdiri</label>
                                <input type="number" class="form-control" name="tahun_berdiri" value="{{old('tahun_berdiri', $profil->tahun_berdiri ?? '' )}}" placeholder="Contoh:2000">
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label fw-bold">Alamat</label>
                                <textarea name="alamat" class="form-control" cols="30" rows="2">{{old('alamat', $profil->alamat ?? '')}}</textarea>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">visi & misi</label>
                                <textarea name="visi_misi" class="form-control" id="" cols="30" rows="3">{{old('visi_misi', $profil->visi_misi ?? '')}}</textarea>

                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Deskripsi Sekolah</label>
                                <textarea name="deskripsi" class="form-control" cols="30" rows="3">{{old('deskripsi', $profil->deskripsi ?? '')}}</textarea>
                            </div>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                            <a href="{{route('profil.index')}}" class="btn btn-secondary px-4">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
    
