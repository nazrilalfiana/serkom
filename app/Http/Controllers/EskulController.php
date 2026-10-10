<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\ekstrakulikuler;
use App\Models\Guru;

class EskulController extends Controller
{
    public function index(){
        $eskuls = ekstrakulikuler::latest()->get();
        return view('eskul.index', compact('eskuls'));
    }
    public function create(){
        $gurus = Guru::all();
        return view('eskul.create', compact('gurus'));
    }
public function store(Request $request)
{
    $request->validate([
        'nama_eskul'     => 'required|string|max:100',
        'pembina'        => 'required|string|max:100',
        'jadwal_latihan' => 'required|string|max:40',
        'deskripsi'      => 'required|string',
        'gambar'         => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
    ]);

    $data = [
        'nama_eskul'     => $request->nama_eskul,
        'pembina'        => $request->pembina,
        'jadwal_latihan' => $request->jadwal_latihan,
        'deskripsi'      => $request->deskripsi,
    ];

    if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('eskul', 'public');
    }

    ekstrakulikuler::create($data);

    return redirect()->route('eskul.index')->with('success', 'Data eskul berhasil dibuat');
}


    public function edit( $id){
        $eskul = ekstrakulikuler::findOrFail($id);
        $gurus = Guru::all();
        return view('eskul.edit', compact('eskul', 'gurus'));

    }
    public function update(Request $request, $id){
        $eskul = ekstrakulikuler::findOrFail($id);

        $request->validate([
            'nama_eskul' => 'required|string|max:100',
            'pembina' => 'required|string|max:100',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar'         => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);
         $data = [
            'nama_eskul'     => $request->nama_eskul,
            'pembina'        => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi'      => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            if ($eskul->gambar && Storage::disk('public')->exists($eskul->gambar)) {
                Storage::disk('public')->delete($eskul->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('eskul', 'public');
        }

        $eskul->update($data);
        return redirect()->route('eskul.index')->with('success', 'Data Berhasill di UPdate');
    }
    public function destroy($id){
        $eskul = ekstrakulikuler::findOrFail($id);

        if ($eskul->gambar && Storage::disk('public')->exists($eskul->gambar)) {
            Storage::disk('public')->delete($eskul->gambar);
        }

        $eskul->delete();
        return redirect()->route('eskul.index')->with('success', 'Data Berhasil Di Hapuss');
    }
}
