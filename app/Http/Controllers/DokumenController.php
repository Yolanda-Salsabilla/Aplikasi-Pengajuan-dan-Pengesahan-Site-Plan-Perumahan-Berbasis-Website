<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Pengajuan;
use App\Models\Persetujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index()
    {
        //
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
    public function show(Dokumen $dokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumen $dokumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokumen $dokumen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumen $dokumen)
    {
        //
    }

    public function addTtdKabid(Request $request)
    {
        $request->validate([
            'ttd_kabid' => 'required|string',
            'pengajuan_id' => 'required|exists:pengajuans,id'
        ]);

        $dataUrl = $request->ttd_kabid;
        $image = str_replace('data:image/png;base64,', '', $dataUrl);
        $image = str_replace(' ', '+', $image);
        $imageName = 'signatures/' . uniqid() . '.png';

        Storage::disk('public')->put($imageName, base64_decode($image));

        Persetujuan::create([
            'pengajuan_id' => $request->pengajuan_id,
            'ttd_kabid' => $imageName,
        ]);

        return redirect()->back()->with('info', 'Keterangan Berhasil Ditambahkan');
    }

    public function uploadDocument(Request $request, $id)
    {
    $request->validate([
        'dokumen' => 'required|file|mimes:pdf,doc,docx',
    ]);

    $persetujuan = Dokumen::find($id);
    if ($request->hasFile('dokumen')) {
        $file = $request->file('dokumen');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('dokumen/', $filename, 'public');

        // Simpan path dokumen ke dalam database
        $persetujuan->dokumen = $filename;

        $persetujuan->save();
    }
    return redirect()->back()->with('success', 'Dokumen berhasil diunggah.');
    }
}
