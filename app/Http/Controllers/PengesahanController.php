<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Pengesahan;
use Illuminate\Http\Request;

class PengesahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function uploadDocumentResmi(Request $request, $id)
     {
        // dd($request->all());
        $request->validate([
            'dokumen_resmi' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $pengesahan = Pengesahan::find($id);
        if ($request->hasFile('dokumen_resmi')) {
            $file = $request->file('dokumen_resmi');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('dokumen_resmi', $filename, 'public');

            // Simpan path dokumen ke dalam database
            $pengesahan->dokumen_resmi = $filename;
            $pengesahan->proses_pengesahan = true;

            $pengesahan->save();
        }
        return redirect()->back()->with('success', 'Dokumen berhasil diunggah.');
     }

     public function index()
     {
         // Get the authenticated user
         $user = auth()->user();
         $role = $user->role; // Assuming there is a 'role' attribute on the user model

         // Fetch data based on the user's role
         if ($role === 'user') {
             // Fetch data specific to the authenticated user
             $pengajuan = Pengajuan::with(['user', 'persetujuan.pengesahan'])
                 ->where('users_id', $user->id_users)
                 ->get();

             $pengesahan = Pengesahan::with(['user', 'persetujuan.pengajuan'])
                 ->whereHas('persetujuan.pengajuan', function ($query) use ($user) {
                     $query->where('users_id', $user->id_users);
                 })
                 ->get();
         } else {
             // Fetch all data
             $pengajuan = Pengajuan::with(['user', 'persetujuan.pengesahan'])->get();
             $pengesahan = Pengesahan::with(['user', 'persetujuan.pengajuan'])->get();
         }

         // Combine the collections and remove duplicates based on the 'id' attribute
         $data = $pengajuan;
        //  dd($data->all());
         return view('pengesahan.index', compact('data'));
     }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengesahan $pengesahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengesahan $pengesahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengesahan $pengesahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengesahan $pengesahan)
    {
        //
    }
}
