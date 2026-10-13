<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EskulController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfilSayaController;

Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/daftar-guru', [LandingPageController::class, 'guru'])->name('landing.guru');
Route::get('/daftar-siswa', [LandingPageController::class, 'siswa'])->name('landing.siswa');
Route::get('/daftar-berita', [LandingPageController::class, 'berita'])->name('landing.berita');
Route::get('/daftar-berita/{id}', [LandingPageController::class, 'beritaDetail'])->name('landing.berita.detail');
Route::get('/profil-lengkap', [LandingPageController::class, 'profil'])->name('landing.profil');
Route::get('/daftar-galeri', [LandingPageController::class, 'galeri'])->name('landing.galeri');
Route::get('/daftar-eskul', [LandingPageController::class, 'eskul'])->name('landing.eskul');
Route::get('/profil-saya', [ProfilSayaController::class, 'index'])->name('profill.profilsaya');



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/






//auth/login
//guest mah ker anu sate acan login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'tampilanlogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/users',[UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('users/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
    Route::put('/users/{id}/reset-password', [UserController::class,  'reset-controller'])->name('user.reset-password');



    Route::get('/profil-sekolah', [ProfilSekolahController::class, 'index'])->name('profil.index');
    Route::get('/profil-sekolah/edit', [ProfilSekolahController::class, 'edit'])->name('profil.edit');
    Route::put('/profil-sekolah/update', [ProfilSekolahController::class, 'update'])->name('profil.update');


    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('guru/create', [GuruCOntroller::class, 'create'])->name('guru.create');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');


    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');


    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
    Route::get('/galeri/{id}/edit', [GaleriController::class, 'edit'])->name('galeri.edit');
    Route::put('/galeri/{id}', [GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    

    Route::get('/eskul', [EskulController::class, 'index'])->name('eskul.index');
    Route::get('/eskul/create', [EskulController::class, 'create'])->name('eskul.create');
    Route::post('/eskul', [EskulController::class, 'store'])->name('eskul.store');
    Route::get('/eskul/{id}/edit', [EskulController::class, 'edit'])->name('eskul.edit');
    Route::put('/eskul/{id}', [EskulController::class, 'update'])->name('eskul.update');
    Route::delete('/eskul/{id}', [EskulController::class, 'destroy'])->name('eskul.destroy');
});
