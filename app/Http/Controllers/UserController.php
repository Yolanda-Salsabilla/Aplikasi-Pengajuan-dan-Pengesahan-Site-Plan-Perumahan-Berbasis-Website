<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        $user = User::all();

        return view('user.index ', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->nama_perusahaan = $request->nama_perusahaan;
        $user->alamat = $request->alamat;
        $user->kontak = $request->kontak;
        $user->email = $request->email;
        $user->role =$request->role;

        $user->save();

        return redirect()->back()->with('success', "Data User berhasil diperbarui");
    }

    public function destroy($id){
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with('message', 'User Berhasil Di hapus');
    }
}
