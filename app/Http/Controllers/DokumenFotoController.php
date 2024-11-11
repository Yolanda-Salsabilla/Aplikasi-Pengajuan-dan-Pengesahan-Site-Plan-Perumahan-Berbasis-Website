<?php

namespace App\Http\Controllers;
use App\Models\Pengajuan;
use App\Models\Pengesahan;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class DokumenFotoController extends Controller
{
    public function index(Request $request)
{
    // Retrieve all data with related models
    $pengajuan = Pengajuan::with(['user', 'persetujuan.pengesahan']);
    $pengesahan = Pengesahan::with(['user', 'persetujuan.pengajuan']);

    // Apply filters based on search inputs
    if ($request->filled('start_date') && $request->filled('end_date')) {
        $startDate = \Carbon\Carbon::parse($request->start_date);
        $endDate = \Carbon\Carbon::parse($request->end_date);

        $pengajuan->whereBetween('tanggal_masuk', [$startDate, $endDate]);
        $pengesahan->whereHas('persetujuan.pengajuan', function ($query) use ($startDate, $endDate) {
            $query->whereBetween('tanggal_masuk', [$startDate, $endDate]);
        });
    }

    if ($request->filled('nama_perumahan')) {
        $pengajuan->where('nama_perumahan', 'LIKE', '%' . $request->nama_perumahan . '%');
        $pengesahan->whereHas('persetujuan.pengajuan', function ($query) use ($request) {
            $query->where('nama_perumahan', 'LIKE', '%' . $request->nama_perumahan . '%');
        });
    }

    $pengajuan = $pengajuan->get();
    $pengesahan = $pengesahan->get();

    // Concatenate the results and remove duplicates
    $data = $pengajuan->concat($pengesahan)->unique('id');

    return view('dokumenfoto.index', compact('data'));
}

public function cetak(Request $request)
{
    $query = Pengajuan::query();

    $startDate = null;
    $endDate = null;

    if ($request->filled('start_date') && $request->filled('end_date')) {
        $startDate = \Carbon\Carbon::parse($request->start_date);
        $endDate = \Carbon\Carbon::parse($request->end_date);
        $query->whereBetween('tanggal_masuk', [$startDate, $endDate]);
    }

    if ($request->filled('nama_perumahan')) {
        $query->where('nama_perumahan', 'LIKE', '%' . $request->nama_perumahan . '%');
    }

    $data = $query->get();

    $pdf = PDF::loadView('dokumenfoto.cetak', compact('data', 'startDate', 'endDate'));
    $pdf->setPaper('HVS', 'landscape');
    return $pdf->stream('dokumenfoto.pdf');
}




    public function cetak_all(Request $request)
    {
        $data = Pengajuan::with(['user'])->get();


        $pdf = PDF::loadView('dokumenfoto.cetal', compact('data'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('dokumenfoto.pdf');
    }
}
