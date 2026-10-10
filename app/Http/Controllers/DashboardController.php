<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\ekstrakulikuler;
use App\Models\Berita;
use App\Models\Galeri;


class DashboardController extends Controller
{
    public function index(){
        $totalUser = User::count();
        $totalAdmin = User::where('role', 'Admin')->count();
        $totalOperator = User::where('role', 'Operator')->count();

        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalEskul = ekstrakulikuler::count();
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::count();
        $beritaTerbaru = Berita::latest()->take(5)->get();

        return view('dashboard.index', compact('totalUser', 'totalAdmin', 'totalOperator', 'totalSiswa', 'totalGuru', 'totalEskul', 'totalBerita', 'totalGaleri', 'beritaTerbaru'));
    }
}
