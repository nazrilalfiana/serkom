@extends('layouts.index')
@section('title_page', 'profile sekolah')
@section('content')
    <div class="container-fluid m-5 mx-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-30 ">
                    <div class="d-flex justify-content-between align-items-center mb-25">
                        <h4 class="text-bold">Profil Sekolah</h4>
                        <a href="{{route('profil.edit')}}" class="btn btn-success btn-sm">
                            <i class="lni lni-pencil"></i> Edit Profil
                        </a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissble fade show mb-20" role="alert">
                            {{session('success')}}
                        </div>
                         
                    @endif
                    <div class="d-flex justify-content-center align-items-center gap-4 mb-4 flex-wrap">
                        <div class="text-center">
                            <p class="fw-bold mb-2"><small class="text-muted">Foto Kepala Sekolah</small></p>
                            <div class="border rounded bg-light d-flex align-items-center justify-content-center overflow-hidden" style="width: 200px; height:200px">
                                @if (!empty($profil->foto_kepala_sekolah) && file_exists(public_path('assets/images/' .  $profil->foto_kepala_sekolah)))
                                    <div class="mb-2">
                                         <img src="{{ asset('assets/images/' . $profil->foto_kepala_sekolah) }}" alt="Foto Kepala Sekolah"
                                            style="width: 100% !important; height: 100% !important; max-width: none !important; object-fit: cover;">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="text-center">
                            <p class="fw-bold mb-2"><small class="text-muted">Logo Sekolah</small></p>
                            <div class="border rounded bg-light d-flex align-items-center justify-content-center overflow-hidden" style="width: 200px; height:200px">
                                @if (!empty($profil->logo))
                                    <img src="{{asset('assets/images/' . $profil->logo)}}" alt="logo sekolah" class="img-fluid rounded border p-2" style="width:100% !important; height:100% !important; max-width: none !important; object-fit:contain; padding:12px">
                                @else
                                   <div class="border rounded p-3 d-flex align-items-center justify-content-center bg-light text-muted mx-auto" style="width:140px; height: 140px">
                                    <small>Tidak Ada Logo</small>
                                   </div>
                                @endif

                            </div>
                        </div>
                        

                        <div class="text-center ">
                             <p class="fw-bold mb-2"><small class="text-muted">Foto Sekolah</small></p>
                             <div class="border rounded bg-light d-flex align-items-center justify-content-center overflow-hidden" style="width: 300px; max-widht: 100%; height:200px">
                                 @if (!empty($profil->foto) && file_exists(public_path('assets/images/' . $profil->foto)))
                                     <img src="{{asset('assets/images/'. $profil->foto)}}" alt="Logo Sekolah" class="img-fluid rounded" style="width: 100% !important; height:100% !important; max-widht: none !important; object-fit: cover;">
                                 @else
                                     <div class="border rounded p-3 d-flex align-items-center justify-content-center bg-light text-muted" style="width: 220px; height:140px">
     
                                         <small>Belum Ada Foto</small>
                                     </div>
                                 @endif

                             </div>
                        </div>
                    </div>

                    
                    <div class="table-wrapper table-responsive">
                        <table class="table striped-table">
                            <tbody>
                                <tr>
                                    <th style="width: 200px;">Nama Sekolah</th>
                                    <td>: {{$profil->nama_sekolah ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <th>Kepala Sekolah</th>
                                    <td>:{{$profil->kepala_sekolah ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <th>NPSN</th>
                                    <td>:{{$profil->npsn ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <th>kontak</th>
                                    <td>: {{$profil->kontak ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <th>Tahun Berdiri</th>
                                    <td>: {{$profil->tahun_berdiri ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <th>alamat</th>
                                    <td>: {{$profil->alamat ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <th>visi & misi</th>
                                    <td>: {{$profil->visi_misi ??'-'}}</td>
                                </tr>
                                <tr>
                                    <th>deskripsi</th>
                                    <td>: {{$profil->deskripsi ?? '-'}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection