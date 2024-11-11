<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Pengesahan;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
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

    // Combine the results
    $combinedData = $pengajuan->concat($pengesahan);

    // Filter out duplicates based on id_pengajuan
    $data = $combinedData->unique(function ($item) {
        return $item instanceof Pengajuan ? $item->id_pengajuans : $item->persetujuan->pengajuan->id_pengajuans;
    });

    // Apply default sorting by id_pengajuans
    $data = $data->sortBy('id_pengajuans');

    // Apply additional sorting if requested
    $sortBy = $request->get('sort_by');
    $sortOrder = $request->get('sort_order', 'asc');

    if ($sortBy) {
        if ($sortBy == 'tanggal_masuk') {
            $data = $data->sortBy(function ($item) {
                return $item instanceof Pengajuan ? $item->tanggal_masuk : optional($item->persetujuan->pengajuan)->tanggal_masuk;
            }, SORT_REGULAR, $sortOrder == 'desc');
        } elseif ($sortBy == 'tanggal_selesai') {
            $data = $data->sortBy(function ($item) {
                return $item instanceof Pengajuan ? optional($item->persetujuan->pengesahan)->updated_at : $item->updated_at;
            }, SORT_REGULAR, $sortOrder == 'desc');
        }
    }

    return view('laporan.index', compact('data', 'sortBy', 'sortOrder'));
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

    $pdf = PDF::loadView('laporan.cetaklaporan', compact('data', 'startDate', 'endDate'));
    $pdf->setPaper('HVS', 'landscape');
    return $pdf->stream('laporan.pdf');
}




    public function cetak_all(Request $request)
    {
        $data = Pengajuan::with(['user'])->get();


        $pdf = PDF::loadView('laporan.cetaklaporan', compact('data'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('laporan.cetaklaporan');
    }
}
