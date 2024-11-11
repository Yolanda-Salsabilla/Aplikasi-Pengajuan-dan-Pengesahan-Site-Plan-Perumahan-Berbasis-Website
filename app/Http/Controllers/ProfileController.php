<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        $data = User::all();

        return view('profil.index')->with('profil', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('profil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Debugging line to check the request data
        // dd($request->all());

        $request->validate([
            'nama' => 'required|unique:profils',
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'asosiasi' => 'required',
            'kontak' => 'required',
            'email' => 'required|email',
            'ttd_pengembang' => 'required',
        ]);

        // Decode the Data URL and save the image
        $dataUrl = $request->ttd_pengembang;
        $image = str_replace('data:image/png;base64,', '', $dataUrl);
        $image = str_replace(' ', '+', $image);
        $imageName = 'signatures/' . uniqid() . '.png'; // Fix file extension

        // Save the image
        Storage::disk('public')->put($imageName, base64_decode($image));

        // Save the path in the database
        $profil = new User;
        $profil->users_id = auth()->user()->id;
        $profil->nama = $request->nama;
        $profil->nama_perusahaan = $request->nama_perusahaan;
        $profil->alamat = $request->alamat;
        $profil->asosiasi = $request->asosiasi;
        $profil->kontak = $request->kontak;
        $profil->email = $request->email;
        $profil->ttd_pengembang = $imageName; // Save the image path

        $profil->save(); // save

        return redirect()->route('profil.index')->with('success', "Data Profil " . $request->nama . " berhasil disimpan");
    }
    public function edit(Request $request): View
    {
        return view('profil.create');
    }

    /**
     * Update the user's profile information.
     */public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'nama_perusahaan' => 'required',
        'alamat' => 'required',
        'asosiasi' => 'required',
        'kontak' => 'required',
        'email' => 'required|email',
        'ttd_pengembang' => 'nullable',
        'ttd_perencana' => 'nullable|image',
    ]);

    $user = User::findOrFail($id);

    // Decode the Data URL and save the image if provided for ttd_pengembang
    if ($request->ttd_pengembang) {
        $dataUrl = $request->ttd_pengembang;
        if (strpos($dataUrl, 'data:image/png;base64,') !== false) {
            $image = str_replace('data:image/png;base64,', '', $dataUrl);
            $image = str_replace(' ', '+', $image);
            $imageName = 'signatures/' . uniqid() . '.png';

            // Save the image
            Storage::disk('public')->put($imageName, base64_decode($image));

            // Set the new signature path
            $user->ttd_pengembang = $imageName;
        }
    }

    // Decode the Data URL and save the image if provided for ttd_perencana
    if ($request->hasFile('ttd_perencana')) {
        $file = $request->file('ttd_perencana');
        $filePath = $file->store('signatures', 'public');
        $user->ttd_perencana = $filePath;
    }

    $user->name = $request->name;
    $user->nama_perusahaan = $request->nama_perusahaan;
    $user->alamat = $request->alamat;
    $user->asosiasi = $request->asosiasi;
    $user->kontak = $request->kontak;
    $user->email = $request->email;

    $user->save();

    return redirect()->back()->with('success', "Data Profil berhasil diperbarui");
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
