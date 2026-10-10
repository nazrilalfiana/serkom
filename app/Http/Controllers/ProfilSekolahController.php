<?php

namespace App\Http\Controllers;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    public function index(){

        $profil= ProfilSekolah::first();
        return view('profil.index', compact('profil'));
    }
    public function edit(){
         $profil= ProfilSekolah::first();
        return view('profil.edit', compact('profil'));
    }
    public function update(Request $request){
        $request->validate([
            'nama_sekolah' => 'required|string|max:40',
            'kepala_sekolah' => 'nullable|string|max:40',
            'npsn' => 'nullable|string|max:10',
            'kontak' => 'nullable|string|max:15',
            'tahun_berdiri' => 'nullable|numeric',
            'alamat' => 'nullable|string',
            'visi_misi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,web|max:2048',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'foto_kepala_sekolah' =>'nullable|image|mimes:jpeg,jpg,png,webp|max:2048'

        ]);
        $profil = ProfilSekolah::first();
        $data = $request->except(['logo','foto', 'foto_kepala_sekolah']);
        
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $logoName = 'logo_' . time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('assets/images'), $logoName);

            if($profil && $profil->logo && file_exists(public_path('assets/images/' . $profil->logo))){
                @unlink(public_path('assets/images/' . $profil->logo));
            }
            $data['logo'] = $logoName;
        }
        
        

        if($request->hasFile('foto')){
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('assets/images'), $imageName);
            
            if($profil && $profil->foto && file_exists(public_path('assets/images/' . $profil->foto))){
                @unlink(public_path('assets/images/'. $profil->foto));
            }
            $data['foto'] = $imageName;
        }

        if(!$profil){
            ProfilSekolah::create(($data));
        }else{
            $profil->update($data);

        }

         if($request->hasFile('foto_kepala_sekolah')){
            $fotokepsek = $request->file('foto_kepala_sekolah');
            $fotokepsekName = 'kepsek_' . time() . '.' . $fotokepsek->getClientOriginalExtension();

            $fotokepsek->move(public_path('assets/images'), $fotokepsekName);
            
            if($profil && $profil->foto_kepala_sekolah && file_exists(public_path('assets/images/' . $profil->foto_kepala_sekolah))){
                @unlink(public_path('assets/images/'. $profil->foto_kepala_sekolah));
            }
            $data['foto_kepala_sekolah'] = $fotokepsekName;
        }

        if(!$profil){
            ProfilSekolah::create(($data));
        }else{
            $profil->update($data);

        }
        return redirect()->route('profil.index')->with('success', 'Profil Sekolah berhasil di perbaharui');
    }
    public function destroy($id){
        $guru = Guru::findOrFail($id);
        if($guru->foto && file_exists(public_path('assets/images/guru' . $guru->foto))){
            @unlink(public_path('assets/images/guru' .  $guru->foto));
        }
        $guru->delete();
        return redirect()->route('guru.index')-with('success', 'Data Guru Berhasil Di Hapus');
    }
}
