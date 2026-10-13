<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $gurus = Guru::when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_guru', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%")
                  ->orWhere('mapel', 'like', "%{$search}%");
            });
        })->latest()->paginate(10)->withQueryString();

        return view('guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:100',
            'nip'       => 'required|string|max:30|unique:gurus,nip',
            'mapel'     => 'nullable|string|max:100',
            'foto'      => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
        ], [
            'nama_guru.required' => 'Nama guru harus diisi.',
            'nip.required'       => 'NIP harus diisi.',
            'nip.unique'         => 'NIP sudah terdaftar.',
            'nip.max'            => 'NIP maksimal 30 karakter.',
            'foto.image'         => 'File harus berupa gambar.',
            'foto.max'           => 'Ukuran foto maksimal 2 MB.',
        ]);

        $data = $request->except(['_token', 'foto']);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = 'guru_' . time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('assets/images/guru'), $fotoName);
            $data['foto'] = $fotoName;
        }

        Guru::create($data);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama_guru' => 'required|string|max:100',
            'nip'       => 'required|string|max:30|unique:gurus,nip,' . $id,
            'mapel'     => 'nullable|string|max:100',
            'foto'      => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
        ], [
            'nama_guru.required' => 'Nama guru harus diisi.',
            'nip.required'       => 'NIP harus diisi.',
            'nip.unique'         => 'NIP sudah terdaftar.',
            'nip.max'            => 'NIP maksimal 30 karakter.',
            'foto.image'         => 'File harus berupa gambar.',
            'foto.max'           => 'Ukuran foto maksimal 2 MB.',
        ]);

        $data = $request->except(['_token', '_method', 'foto']);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = 'guru_' . time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('assets/images/guru'), $fotoName);

            if ($guru->foto && file_exists(public_path('assets/images/guru/' . $guru->foto))) {
                @unlink(public_path('assets/images/guru/' . $guru->foto));
            }
            $data['foto'] = $fotoName;
        }

        $guru->update($data);

        return redirect()->route('guru.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->foto && file_exists(public_path('assets/images/guru/' . $guru->foto))) {
            @unlink(public_path('assets/images/guru/' . $guru->foto));
        }

        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data berhasil dihapus!');
    }
}