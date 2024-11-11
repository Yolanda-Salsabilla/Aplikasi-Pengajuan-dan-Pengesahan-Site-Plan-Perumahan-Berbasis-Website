<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Pengajuan;
use App\Models\Persetujuan;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function persetujuanadmin()
    {
        // Mengambil data pengajuan dengan relasi user, hanya pengajuan yang belum disetujui oleh admin dan milik user yang sedang login
        if (auth()->user()->role === 'user') {
            $data = Pengajuan::with('user')
                ->where('users_id', auth()->user()->id_users)
                ->get();
        } else {
            $data = Pengajuan::with('user')
                ->get();
        }

        // dd($data);
        return view('prosesadmin.index', compact('data'));
    }

    public function persetujuanteknis(){
        if (auth()->user()->role === 'user') {
            $data = Pengajuan::with('user')
                ->where('users_id', auth()->user()->id_users)
                ->get();
        } else {
            $data = Pengajuan::with('user')
                ->get();
        }

        return view('prosesteknis.index', compact('data'));
    }

    public function persetujuandokumen()
    {
        $data = Pengajuan::with(['user','persetujuan', 'dokumen'])->get();
        // dd($data);

    return view('prosesdokumen.index', compact('data'));
    }



    public function addKeteranganAdmin(Request $request, $id){
        $request->validate(['keterangan_admin' => 'required']);
        $data = Pengajuan::findOrFail($id);
        $data->keterangan_admin = $request->keterangan_admin;
        $data->save();

        return redirect()->back()->with('success', 'Keterangan Berhasil Diperbarui dengan nama perumahan berikut ' . $data->nama_perumahan);
    }

    public function updateKeteranganAdmin(Request $request, $id)
    {
        $request->validate(['keterangan_admin' => 'required']);
        $data = Pengajuan::findOrFail($id);
        $data->keterangan_admin = $request->keterangan_admin;
        $data->save();

        return redirect()->back()->with('success', 'Keterangan Berhasil Diperbarui dengan nama perumahan berikut ' . $data->nama_perumahan);
    }

    public function addKeteranganTeknis(Request $request, $id){
        $request->validate(['keterangan_teknis' => 'required']);
        $data = Pengajuan::findOrFail($id);
        $data->keterangan_teknis = $request->keterangan_teknis;
        $data->save();

        return redirect()->back()->with('success', 'Keterangan Berhasil Diperbarui dengan nama perumahan berikut ' . $data->nama_perumahan);
    }

    public function updateKeteranganTeknis(Request $request, $id)
    {
        $request->validate(['keterangan_teknis' => 'required']);
        $data = Pengajuan::findOrFail($id);
        $data->keterangan_teknis = $request->keterangan_teknis;
        $data->save();

        return redirect()->back()->with('success', 'Keterangan Berhasil Diperbarui dengan nama perumahan berikut ' . $data->nama_perumahan);
    }

    public function updateStatusAdmin(Request $request, $id)
    {
        //dd($request->all());
        $request->validate(['statusadmin' => 'required']);
        $data = Pengajuan::findOrFail($id);
        $data->statusadmin = $request->statusadmin;
        $data->save();

        return redirect()->back()->with('success', 'Status Berhasil Diperbarui dengan nama perumahan '. $data->nama_perumahan);
    }

    public function updateStatusTeknis(Request $request, $id)
    {
        $request->validate(['statusteknis' => 'required']);
        $data = Pengajuan::findOrFail($id);

        $data->statusteknis = $request->statusteknis;
        $data->save();

        return redirect()->back()->with('success', 'Status Berhasil Diperbarui dengan nama perumahan '. $data->nama_perumahan);
    }

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
    public function show(Persetujuan $persetujuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persetujuan $persetujuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persetujuan $persetujuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persetujuan $persetujuan)
    {
        //
    }
}
