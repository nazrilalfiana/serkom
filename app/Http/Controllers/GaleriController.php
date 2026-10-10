<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;
class GaleriController extends Controller
{
    public function index() {
        $galeris = Galeri::latest()->get();
        return view('galeri.index', compact('galeris'));
    }
    public function create(){
        return view('galeri.create');
    }
    public function store(Request $request){
        $request->validate([
            'judul' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
            'kategori' => 'required|in:foto,video',
            'file' =>'required|file|mimes:jpeg,jpg,png,gif,mp4,mov,avi,wmv,mkv,webm|max:51200'
        ]);
        $filePath = $request->file('file')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $filePath,
            'kategori' => $request->kategori,
        ]);
        return redirect()->route('galeri.index')->with('success', 'Galeri Berhasilll Di Tambahhhhhh');
    }
    public function edit($id){
        $galeri =Galeri::findOrFail($id);
        return view('galeri.edit', compact('galeri'));
    }


    public function update(Request $request, $id){
        $galeri = Galeri::findOrFail($id);
        $request->validate([
            'judul' =>'required|string|max:50',
            'keterangan' => 'nullable|string',
            'kategori' => 'required|in:foto,video',
           'file' =>'nullable|file|mimes:jpeg,jpg,png,gif,mp4,mov,avi,wmv,mkv,webm|max:51200'
        ]);
        $data = [
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
        ];
        if($request->hasFile('file')){
            if ($galeri->file && Storage::disk('public')->exists($galeri->file)){
                Storage::disk('public')->delete($galeri->file);
            }
            $data['file'] = $request->file('file')->store('galeri', 'public');
        }
        $galeri->update($data);
        return redirect()->route('galeri.index')->with('success', 'Galeri Berhasil DI Updatee');
    }



    public function destroy($id){
        $galeri = Galeri::findOrFail($id);
        if($galeri->file && Storage::disk('public')->exists($galeri->file)){
            Storage::disk('public')->delete($galeri->file);
        }
        $galeri->delete();
        return redirect()->route('galeri.index')->with('success', 'Galeri Berhasillll di hapusssss');
    }
}

