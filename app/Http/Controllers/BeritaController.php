<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index(){
        $beritas = Berita::latest()->get();
        return view('berita.index', compact('beritas'));
    }
    public function create(){
        return view('berita.create');
    }
    public function store(Request $request){
        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' =>'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status' => 'required|in:draf,publis'
        ]);
        $gambarPath = null;
        if($request->hasFile('gambar')){
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }
        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar' => $gambarPath,
            'status' => $request->status,
            'id_user' => Auth::id() ?? 1,
        ]);
        return redirect()->route('berita.index')->with('success', 'Berita Berhasil Di Simpannnnn');
    }
    public function edit($id){
        $berita = Berita::findOrfail($id);
        $this->otorisasi($berita);
        return view('berita.edit', compact('berita'));
    }
    public function update(Request $request,$id){
        $berita = Berita::findOrFail($id);
        $this->otorisasi($berita);
        $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' =>'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status' => 'required|in:draf,publis'

        ]);
        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status
        ];
        if($request->hasFile('gambar')){
            if($berita->gambar &&  Storage::disk('public')->exists($berita->gambar)){
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gamabar'] =$request->file('gambar')->store('berita', 'public');
        }
        $berita->update($data);
        return redirect()->route('berita.index')->with('success', 'Berita Berhasil Di Updatee');
    }
    public function destroy($id){
        $berita = Berita::findOrFail($id);
        $this->otorisasi($berita);
        if($berita->gambar && Storage::disk('public')->exists($berita->gambar)){
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();
        return redirect()->route('berita.index')->with('succes', 'Berita Berhasil Di Hapusss');
    }
    public function otorisasi(Berita $berita){
        if(auth()->user()->role !== 'Admin' && $berita->id_user !== auth()->id()){
            abort(403, 'Anda ridak berhak mengubah berita ini');
        }
    }
}
