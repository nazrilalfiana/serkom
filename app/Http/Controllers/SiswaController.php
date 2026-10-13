<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $siswas = Siswa::with('kelas')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_siswa', 'like', "%{$search}%")
                      ->orWhere('nisn', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        $kelas = Kelas::orderBy('kelas')->get();
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nisn'          => 'required|string|min:10|max:15|unique:siswas,nisn',
            'nama_siswa'    => 'required|string|max:100',
            'kelas_id'      => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tahun_masuk'   => 'required|digits:4',
        ], $this->pesan());

        Siswa::create($data);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil disimpan');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::orderBy('kelas')->get();
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $data = $request->validate([
            'nisn'          => 'required|string|min:10|max:15|unique:siswas,nisn,' . $id,
            'nama_siswa'    => 'required|string|max:100',
            'kelas_id'      => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tahun_masuk'   => 'required|digits:4',
        ], $this->pesan());

        $siswa->update($data);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diubah');
    }

    public function destroy($id)
    {
        Siswa::findOrFail($id)->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }

    private function pesan(): array
    {
        return [
            'nisn.required'          => 'NISN harus diisi.',
            'nisn.unique'            => 'NISN sudah terdaftar.',
            'nisn.min'               => 'NISN minimal 10 karakter.',
            'nisn.max'               => 'NISN maksimal 15 karakter.',
            'nama_siswa.required'    => 'Nama siswa harus diisi.',
            'kelas_id.required'      => 'Kelas harus dipilih.',
            'kelas_id.exists'        => 'Kelas tidak valid.',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
            'jenis_kelamin.in'       => 'Jenis kelamin tidak valid.',
            'tahun_masuk.required'   => 'Tahun masuk harus diisi.',
            'tahun_masuk.digits'     => 'Tahun masuk harus 4 digit, contoh 2024.',
        ];
    }
}