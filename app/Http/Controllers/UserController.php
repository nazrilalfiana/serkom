<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users =User::all();
        return view('user.index', compact('users'));
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        //hanap ieu validasi
        $request->validate([
            'username' =>'required',
            'password' => 'required|min:6',
            'role' => 'required|in:Admin,Operator'
        ]);
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        return redirect()->route('user.index')->with('berhasil', 'data berhasil di simpan');
    }
    public function edit($id){
        $user = User::findOrFail($id);
        return view('user.edit',compact('user'));
    }

    public function update(Request $request, $id){

        $user = User::findOrfail($id);

        $request->validate([
            'username' => 'required|unique:users,username,'.$id,
            'role' => 'required',
        ]);
        $data = [
            'username' => $request->username,
            'role' => $request->role,
        ];
        if($request->filled('password')){
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);

        return redirect()->route('user.index')->with('berhasil', 'User berhasil di ubah');
    }

    public function destroy($id){

        $user = User::findOrFail($id);
        
        $user->delete();
        return redirect()->route('user.index')->with('berhasil', 'User berhasil di hapus');
    }


    public function profile(){
        $user = auth()->user();
        return view('user.profile', compact('user'));
    }
    public function updateProfile(Request $request){
        $user = auth()->user();
        $request->validate([
            'username' =>'required|unique:users,username,' . $user->id,
            'password' => 'nullable|min:6',
        ]);
        $data = [
            'username' => $request->username,
        ];
        if($request->filled('password')){
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        return redirect()->back()->with('success', 'profil berhasil di perbaharui!');
    }
    public function resetPassword(Request $request, $id){
        abort_if(auth()->user()->role !== 'Admin', 403);
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);
        $user = User::findOrFail($id);
        $user->update(['password'=> Hash::make($request->password)]);

        return back()->with('success', 'password' . $user->username . 'berhasil di reset');
    }

}
