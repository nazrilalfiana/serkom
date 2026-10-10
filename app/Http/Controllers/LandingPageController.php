<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\Guru; 
use App\Models\ekstrakulikuler;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\ProfilSekolah;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing.landing',[
            'profil' =>ProfilSekolah::first(),
            'totalSiswa' => Siswa::count(),
            'totalGuru' =>Guru::count(),
            'totalEskul' =>ekstrakulikuler::count(),
            'eskuls' => ekstrakulikuler::latest()->take(4)->get(),
            'gurus' => Guru::latest()->take(4)->get(),

            'beritas' => Berita::whereRaw('LOWER(TRIM(status)) = ?', ['publis'])
                                    ->orderByDesc('tanggal')
                                    ->take(3)
                                    ->get(),
            'galeris' => Galeri::latest()->take(8)->get(),
        ]);
    }
    public function guru(){
        return view('landing.guru', ['gurus' => Guru::orderBy('nama_guru')->get()]);
    }
    public function berita(){
        return view('landing.berita', ['beritas' => Berita::whereRaw('LOWER(TRIM(status)) = ?', ['publis'])
                                                        ->orderByDesc('tanggal')
                                                        ->paginate(9),
        ]);
    }
    public function beritaDetail($id){
        $berita = Berita::whereRaw('LOWER(TRIM(status)) = ?', ['publis'])
                                                ->findOrFail($id);
        $lainnya = Berita::whereRaw('LOWER(TRIM(status)) = ?', ['publis'])
                                                ->where('id', '!=', $id)
                                                ->orderByDesc('tanggal')
                                                ->take(3)
                                                ->get();
        return view('landing.berita-detail', compact('berita', 'lainnya'));
    }
    public function profil(){
        return view('landing.profil', [
            'profil' => ProfilSekolah::first(),
            'totalSiswa' => Siswa::count(),
            'totalGuru' => Guru::count(),
            'totalEskul' =>ekstrakulikuler::count(),
        ]);
    }
    public function galeri(Request $request){
        $query = Galeri::latest();
        if(in_array($request->kategori, ['foto', 'video'])){
            $query->where('kategori', $request->kategori);
        }
        return view('landing.galeri', [
            'galeris' => $query->paginate(12)->withQueryString(),
            'kategori' => $request->kategori,
        ]);
    }
    public function eskul(){
        return view('landing.eskul', [
            'eskuls' =>ekstrakulikuler::orderBy('nama_eskul')->get()
        ]);
    }
}