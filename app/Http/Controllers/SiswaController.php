<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');
        $siswas = Siswa::when($search, function($query, $search){
            return $query->where('nama_siswa', 'like', "%{$search}%")
                        ->orWhere('nisn', 'like', "%{$search}%");
        })->latest()->paginate(10);
        return view('siswa.index', compact('siswas'));


    }
    public function create(){
        return view('siswa.create');
    }
    public function store(Request $request){
        $request->validate([
            'nisn' => 'nullable|string|max:20|unique:siswas,nisn',
            'nama_siswa' =>'required|string|max:100',
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
            'tahun_masuk' => 'nullable|string|max:4'
        ]);
        
        Siswa::create($request->all());
        return redirect()->route('siswa.index')->with('success', 'data berhasil di simpan!!!!!!');
    }

    public function edit($id){
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }
    
    public function update(Request $request,$id){
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nisn' => 'nullable|string|max:20|unique:siswas,nisn,' . $id,
            'nama_siswa' => 'required|string|max:100',
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
            'tahun_masuk' => 'nullable|string|max:4'
        ]);
        $siswa->update($request->all());
        return redirect()->route('siswa.index')->with('success', 'Data Berhasil di Ubahhhhh');
    }
    public function destroy($id){
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data Siswaaa Berhasill Di hapusss');
    }
}
