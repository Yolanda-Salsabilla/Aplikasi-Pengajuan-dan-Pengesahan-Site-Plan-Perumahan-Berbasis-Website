<?php

namespace App\Http\Controllers;

use App\Models\Historys;
use App\Models\Pengajuan;
use App\Models\Persetujuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $data = Pengajuan::with('user')
                ->where('users_id', auth()->user()->id_users)
                ->get();
                // dd($data)->all();
        return view('pengajuan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Log seluruh data request untuk debugging
    // dd($request->all());

    // Validasi input dari request
    $request->validate([
        'nama_perumahan' => 'required',
        'nama_perencana' => 'required',
        'alamat' => 'required',
        'tipe' => 'required',
        'jumlah' => 'required|integer',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'tanggal_masuk' => 'required|date',
        'surat_ktp' => 'required|file|mimes:pdf,dwg',
        'permohonan_pengesahan' => 'required|file|mimes:pdf',
        'akta' => 'required|file|mimes:pdf',
        'sbu' => 'required|file|mimes:pdf',
        'sspt_pbblunas' => 'required|file|mimes:pdf',
        'sertif' => 'required|file|mimes:pdf',
        'npwp_perusahaan' => 'required|file|mimes:pdf',
        'slujk' => 'required|file|mimes:pdf',
        'dok_lingkungan' => 'required|file|mimes:pdf',
        'siup_situ_nib' => 'required|file|mimes:pdf',
        'info_pupr' => 'required|file|mimes:pdf',
        'rancangan_steplan' => 'required|image|mimes:jpeg,png,jpg',
        'rancangan_potongan'=> 'required|image|mimes:jpeg,png,jpg',
        'denah' => 'required|image|mimes:jpeg,png,jpg',
        'lokasi' => 'required|image|mimes:jpeg,png,jpg',
        'ttd_perencana' => 'required|image|mimes:jpeg,png,jpg',
    ]);

    try {
        $pengajuan = new Pengajuan;
        $pengajuan->nama_perencana = $request->input('nama_perencana');
        $pengajuan->nama_perumahan = $request->input('nama_perumahan');
        $pengajuan->users_id = auth()->user()->id_users;
        $pengajuan->alamat = $request->input('alamat');
        $pengajuan->tipe = $request->input('tipe');
        $pengajuan->Jumlah = $request->input('jumlah');
        $pengajuan->latitude = (string) $request->input('latitude');
        $pengajuan->longitude = (string) $request->input('longitude');
        $pengajuan->tanggal_masuk = $request->input('tanggal_masuk');

        // Handle file uploads
        $files = [
            'surat_ktp', 'permohonan_pengesahan', 'akta', 'sspt_pbblunas', 'sertif', 'npwp_perusahaan', 'slujk',
            'dok_lingkungan', 'siup_situ_nib', 'info_pupr', 'rancangan_steplan', 'denah', 'lokasi', 'sbu',
            'ttd_perencana', 'rancangan_potongan'
        ];

        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                $fileName = time() . '_' . $file . '.' . $request->file($file)->getClientOriginalExtension();
                $request->file($file)->storeAs('public/' . $file . 's', $fileName);
                $pengajuan->$file = $fileName;
            }
        }

        $pengajuan->save();

        $user = auth()->user()->name;
        Historys::create([
            'description' => "$user telah mengirimkan pengajuan dengan nama perumahan = " . $request->input('nama_perumahan')
        ]);

        return redirect()->back()->with('success', "Data Pengajuan Perumahan " . $request->input('nama_perumahan') . " Berhasil Dikirim ");
    } catch (\Exception $e) {
        // Log the error message
        Log::error('Error saving Pengajuan: ' . $e->getMessage());

        return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim data pengajuan. Silakan coba lagi.');
    }
}




    /**
     * Display the specified resource.
     */
    public function show(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($pengajuan)
    {
        $pengajuan = Pengajuan::findOrFail($pengajuan);
        return view('pengajuan.edit', compact('pengajuan'));
    }
    public function edit1($pengajuan)
    {
        $pengajuan = Pengajuan::findOrFail($pengajuan);
        return view('pengajuan.edit1', compact('pengajuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAdmin(Request $request, $id_pengajuan)
    {
    // Log seluruh data request untuk debugging
    // dd($request->all());

    // Validasi input dari request
    $validator = Validator::make($request->all(), [
        'nama_perumahan' => 'required',
        'nama_perencana' => 'required',
        'alamat' => 'required',
        'tipe' => 'required',
        'Jumlah' => 'required|integer',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'tanggal_masuk' => 'required|date',
        'surat_ktp' => 'nullable|file|mimes:pdf,dwg',
        'permohonan_pengesahan' => 'nullable|file|mimes:pdf',
        'akta' => 'nullable|file|mimes:pdf',
        'sbu' => 'nullable|file|mimes:pdf',
        'sspt_pbblunas' => 'nullable|file|mimes:pdf',
        'sertif' => 'nullable|file|mimes:pdf',
        'npwp_perusahaan' => 'nullable|file|mimes:pdf',
        'slujk' => 'nullable|file|mimes:pdf',
        'dok_lingkungan' => 'nullable|file|mimes:pdf',
        'siup_situ_nib' => 'nullable|file|mimes:pdf',
        'info_pupr' => 'nullable|file|mimes:pdf',
        'rancangan_steplan' => 'nullable|image|mimes:jpeg,png,jpg',
        'rancangan_potongan' => 'nullable|image|mimes:jpeg,png,jpg',
        'denah' => 'nullable|image|mimes:jpeg,png,jpg',
        'lokasi' => 'nullable|image|mimes:jpeg,png,jpg',
        'ttd_perencana' => 'nullable|image|mimes:jpeg,png,jpg',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $pengajuan = Pengajuan::findOrFail($id_pengajuan);
    $pengajuan->nama_perencana = $request->input('nama_perencana');
    $pengajuan->nama_perumahan = $request->input('nama_perumahan');
    $pengajuan->users_id = auth()->user()->id_users;
    $pengajuan->alamat = $request->input('alamat');
    $pengajuan->tipe = $request->input('tipe');
    $pengajuan->Jumlah = $request->input('Jumlah');
    $pengajuan->ket_update_administrasi = true;
    $latitude = (string) $request->input('latitude');
    $longitude = (string) $request->input('longitude');
    Log::info('Latitude: ' . $latitude);
    Log::info('Longitude: ' . $longitude);
    $pengajuan->latitude = $latitude;
    $pengajuan->longitude = $longitude;
    $pengajuan->tanggal_masuk = $request->input('tanggal_masuk');

    $files = [
        'surat_ktp', 'permohonan_pengesahan', 'akta', 'sspt_pbblunas', 'sertif', 'npwp_perusahaan',
        'slujk', 'dok_lingkungan', 'siup_situ_nib', 'info_pupr', 'rancangan_steplan', 'denah',
        'lokasi', 'sbu', 'ttd_perencana', 'rancangan_potongan'
    ];

    foreach ($files as $key) {
        if ($request->hasFile($key)) {
            $file = $request->file($key);
            $fileName = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/' . $key . 's', $fileName);
            $pengajuan->$key = $fileName;
        }
    }



    $pengajuan->save();

    $user = auth()->user()->name;
        Historys::create([
            'description' => "$user telah mengubah pengajuan dengan nama perumahan = " . $request->input('nama_perumahan')
        ]);

    return redirect('/persetujuanadmin')->with('success', "Data pengajuan " . $request->input('nama_perumahan') . " berhasil diperbarui");
}

public function updateTeknis(Request $request, $id_pengajuan)
{
    $validator = Validator::make($request->all(), [
        'nama_perumahan' => 'required',
        'nama_perencana' => 'required',
        'alamat' => 'required',
        'tipe' => 'required',
        'Jumlah' => 'required|integer',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'tanggal_masuk' => 'required|date',
        'surat_ktp' => 'nullable|file|mimes:pdf,dwg',
        'permohonan_pengesahan' => 'nullable|file|mimes:pdf',
        'akta' => 'nullable|file|mimes:pdf',
        'sbu' => 'nullable|file|mimes:pdf',
        'sspt_pbblunas' => 'nullable|file|mimes:pdf',
        'sertif' => 'nullable|file|mimes:pdf',
        'npwp_perusahaan' => 'nullable|file|mimes:pdf',
        'slujk' => 'nullable|file|mimes:pdf',
        'dok_lingkungan' => 'nullable|file|mimes:pdf',
        'siup_situ_nib' => 'nullable|file|mimes:pdf',
        'info_pupr' => 'nullable|file|mimes:pdf',
        'rancangan_steplan' => 'nullable|image|mimes:jpeg,png,jpg',
        'rancangan_potongan' => 'nullable|image|mimes:jpeg,png,jpg',
        'denah' => 'nullable|image|mimes:jpeg,png,jpg',
        'lokasi' => 'nullable|image|mimes:jpeg,png,jpg',
        'ttd_perencana' => 'nullable|image|mimes:jpeg,png,jpg',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $pengajuan = Pengajuan::findOrFail($id_pengajuan);
    $pengajuan->nama_perencana = $request->input('nama_perencana');
    $pengajuan->nama_perumahan = $request->input('nama_perumahan');
    $pengajuan->users_id = auth()->user()->id_users;
    $pengajuan->alamat = $request->input('alamat');
    $pengajuan->tipe = $request->input('tipe');
    $pengajuan->Jumlah = $request->input('Jumlah');
    $pengajuan->ket_update_teknis = true;
    $latitude = (string) $request->input('latitude');
    $longitude = (string) $request->input('longitude');
    Log::info('Latitude: ' . $latitude);
    Log::info('Longitude: ' . $longitude);
    $pengajuan->latitude = $latitude;
    $pengajuan->longitude = $longitude;
    $pengajuan->tanggal_masuk = $request->input('tanggal_masuk');

    $files = [
        'surat_ktp', 'permohonan_pengesahan', 'akta', 'sspt_pbblunas', 'sertif', 'npwp_perusahaan',
        'slujk', 'dok_lingkungan', 'siup_situ_nib', 'info_pupr', 'rancangan_steplan', 'denah',
        'lokasi', 'sbu', 'ttd_perencana', 'rancangan_potongan'
    ];

     foreach ($files as $key) {
        if ($request->hasFile($key)) {
            $file = $request->file($key);
            $fileName = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/' . $key . 's', $fileName);
            $pengajuan->$key = $fileName;
        } else {
            $pengajuan->$key = $pengajuan->getOriginal($key); // Keep the old file
        }
    }

    $pengajuan->save();

    $user = auth()->user()->name;

    Historys::create([
        'description' => "$user telah mengubah pengajuan dengan nama perumahan = " . $request->input('nama_perumahan')
    ]);

    return redirect('/persetujuanteknis')->with('success', "Data pengajuan " . $request->input('nama_perumahan') . " berhasil diperbarui");
}





    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        $pengajuan->delete();
        return redirect()->back()->with('success', "Pengajuan berhasil dihapus");
    }

    public function updateTtdKadin(Request $request, $id)
    {
        $request->validate([
            'ttd_kadin' => 'required|string'
        ]);

        $dataUrl = $request->ttd_kadin;
        $image = str_replace('data:image/png;base64,', '', $dataUrl);
        $image = str_replace(' ', '+', $image);
        $imageName = 'signatures/' . uniqid() . '.png';

        Storage::disk('public')->put($imageName, base64_decode($image));

        $persetujuan = Persetujuan::where('pengajuans_id', $id)->first();
        if ($persetujuan) {
            $persetujuan->ttd_kadin = $imageName;
            $persetujuan->save();
        } else {
            return redirect()->back()->with('error', 'Data persetujuan tidak ditemukan.');
        }

        return redirect()->back()->with('success', 'TTD Kadin berhasil diperbarui');
    }
    public function updateTtdStaff(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'ttd_staff' => 'required|string'
        ]);

        $dataUrl = $request->ttd_staff;
        $image = str_replace('data:image/png;base64,', '', $dataUrl);
        $image = str_replace(' ', '+', $image);
        $imageName = 'signatures/' . uniqid() . '.png';

        Storage::disk('public')->put($imageName, base64_decode($image));

        $persetujuan = Persetujuan::where('pengajuans_id', $id)->first();
        if ($persetujuan) {
            $persetujuan->ttd_staff = $imageName;
            $persetujuan->save();
        } else {
            return redirect()->back()->with('error', 'Data persetujuan tidak ditemukan.');
        }

        return redirect()->back()->with('success', 'TTD staff berhasil diperbarui');
    }
    public function updateTtdKabid(Request $request, $id)
    {
        $request->validate([
            'ttd_kabid' => 'required|string'
        ]);

        $dataUrl = $request->ttd_kabid;
        $image = str_replace('data:image/png;base64,', '', $dataUrl);
        $image = str_replace(' ', '+', $image);
        $imageName = 'signatures/' . uniqid() . '.png';

        Storage::disk('public')->put($imageName, base64_decode($image));

        $persetujuan = Persetujuan::where('pengajuans_id', $id)->first();
        if ($persetujuan) {
            $persetujuan->ttd_kabid = $imageName;
            $persetujuan->save();
        } else {
            return redirect()->back()->with('error', 'Data persetujuan tidak ditemukan.');
        }

        return redirect()->back()->with('success', 'TTD Kabid berhasil diperbarui');
    }
}
