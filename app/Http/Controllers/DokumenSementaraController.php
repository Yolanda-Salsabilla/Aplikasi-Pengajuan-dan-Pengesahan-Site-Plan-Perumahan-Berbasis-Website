<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Pengesahan;
use App\Models\Persetujuan;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class DokumenSementaraController extends Controller
{
    public function index(Request $request)
    {
        $user = User::all();
        $data = Pengajuan::all();
        return view('dokumen.index', compact('data','user'));
    }

    public function generateDocx(Request $request)
    {
        // dd($request->input->all());
        $validate = Validator::make($request->all(), [
            'nomor_naskah' => 'required|string',
            'tanggal_naskah' => 'required|date',
            'kepada_penerima' => 'required|string',
            'surat_pengembang' => 'required|string',
            'nomor_shm' => 'required|string',
            'nib_tanah' => 'required|string',
            'detail_lanjutan' => 'required|string',
            'luas_rencana_pembangunan' => 'required|string',
            'tanggal_survei' => 'required|date',
            'wilayah_pembangunan' => 'required|string',
            'nomor_itr' => 'required|string',
            'tanggal_itr' => 'required|date',
            'peruntukan_kawasan' => 'required|string',
            'pengajuans_id' => 'required|exists:pengajuans,id_pengajuans',
            'users_id' => 'required|exists:users,id_users'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => $validate->errors(),
            ], 400);
        }
        $nomornaskah = $request->input('nomor_naskah');
        $namastaff = $request->input('nama_staff');
        $nipstaff = $request->input('nip_staff');
        $nama_kabid = $request->input('nama_kabid');
        $nip_kabid = $request->input('nip_kabid');
        $nama_kadin = $request->input('nama_kadin');
        $nip_kadin = $request->input('nip_kadin');
        $tanggalnaskah = $request->input('tanggal_naskah');
        $kepadapenerima = $request->input('kepada_penerima');
        $suratpengembang = $request->input('surat_pengembang');
        $nomorshm = $request->input('nomor_shm');
        $nibtanah = $request->input('nib_tanah');
        $detaillanjutan = $request->input('detail_lanjutan');
        $luasrencanapembangunan = $request->input('luas_rencana_pembangunan');
        $tanggalsurvei = $request->input('tanggal_survei');
        $wilayahpembangunan = $request->input('wilayah_pembangunan');
        $nomoritr = $request->input('nomor_itr');
        $tanggalitr = $request->input('tanggal_itr');
        $peruntukan_kawasan = $request->input('peruntukan_kawasan');
        $pengajuan = Pengajuan::findOrFail($request->input('pengajuans_id'));
        $persetujuan = Persetujuan::findOrFail($pengajuan->id_pengajuans);
        $user = User::findOrFail($request->input('users_id'));
        $namaperumahan = $pengajuan->nama_perumahan;
        $alamat = $pengajuan->alamat;


        // Ambil gambar dari database
        $nama_pengembang = $user->name;
        $nama_perusahaan = $user->nama_perusahaan;
        $nama_perencana = $pengajuan->nama_perencana;
        $ttd_pengembang = $user->ttd_pengembang;
        $ttd_perencana = $pengajuan->ttd_perencana;
        $ttd_staff = $persetujuan->ttd_staff;
        $ttd_kabid = $persetujuan->ttd_kabid;
        $ttd_kadin = $persetujuan->ttd_kadin;
        $rancangan_steplan = $pengajuan->rancangan_steplan;
        $rancangan_potongan = $pengajuan->rancangan_potongan;
        $denah = $pengajuan->denah;
        $lokasi = $pengajuan->lokasi;

        $wordData = $request->all();
        $wordData['nama_perusahaan'] = $nama_perusahaan;
        $wordData['nama_kabid'] = $nama_kabid;
        $wordData['nip_kabid'] = $nip_kabid;
        $wordData['nama_kadin'] = $nama_kadin;
        $wordData['nip_kadin'] = $nip_kadin;
        $wordData['nama_staff'] = $namastaff;
        $wordData['nip_staff'] = $nipstaff;
        $wordData['nama_perencana'] = $nama_perencana;
        $wordData['nama_pengembang'] = $nama_pengembang;
        $wordData['ttd_pengembang'] = $ttd_pengembang;
        $wordData['ttd_perencana'] = $ttd_perencana;
        $wordData['ttd_staff'] = $ttd_staff;
        $wordData['ttd_kabid'] = $ttd_kabid;
        $wordData['ttd_kadin'] = $ttd_kadin;
        $wordData['tahun'] = date('Y');
        $wordData['nomor_naskah'] = $nomornaskah;
        $wordData['alamat'] = $alamat;
        $wordData['nama_perumahan'] = $namaperumahan;
        $wordData['tanggal_naskah'] = $tanggalnaskah;
        $wordData['kepada_penerima'] = $kepadapenerima;
        $wordData['surat_pengembang'] = $suratpengembang;
        $wordData['nomor_shm'] = $nomorshm;
        $wordData['nib_tanah'] = $nibtanah;
        $wordData['detail_lanjutan'] = $detaillanjutan;
        $wordData['luas_rencana_pembangunan'] = $luasrencanapembangunan;
        $wordData['tanggal_survei'] = $tanggalsurvei;
        $wordData['wilayah_pembangunan'] = $wilayahpembangunan;
        $wordData['nomor_itr'] = $nomoritr;
        $wordData['tanggal_itr'] = $tanggalitr;
        $wordData['peruntukan_kawasan'] = $peruntukan_kawasan;
        $wordData['rancangan_steplan'] = $rancangan_steplan;
        $wordData['rancangan_potongan'] = $rancangan_potongan;
        $wordData['denah'] = $denah;
        $wordData['lokasi'] = $lokasi;

        return $this->generateWordDocument($wordData, $pengajuan);
    }

    protected function generateWordDocument($wordData, $pengajuan)
    {
        $templatePath = public_path('TemplateWord.docx');
        $template = new TemplateProcessor($templatePath);

        // Set values in the template
        $template->setValue('tanggal_naskah', Carbon::parse($wordData['tanggal_naskah'])->translatedFormat('d F Y'));
        $template->setValue('nomor_naskah', $wordData['nomor_naskah']);  // Replace with actual value if needed
        $template->setValue('kepada_penerima', $wordData['kepada_penerima']);
        $template->setValue('nama_perusahaan', $wordData['nama_perusahaan']);
        $template->setValue('nama_kabid', $wordData['nama_kabid']);
        $template->setValue('nip_kabid', $wordData['nip_kabid']);
        $template->setValue('nama_kadin', $wordData['nama_kadin']);
        $template->setValue('nip_kadin', $wordData['nip_kadin']);
        $template->setValue('nama_staff', $wordData['nama_staff']);
        $template->setValue('nip_staff', $wordData['nip_staff']);
        $template->setValue('nama_perencana', $wordData['nama_perencana']);
        $template->setValue('nama_pengembang', $wordData['nama_pengembang']);
        $template->setValue('tahun', $wordData['tahun']);
        $template->setValue('alamat', $wordData['alamat']);
        $template->setValue('surat_pengembang', $wordData['surat_pengembang']);
        $template->setValue('nomor_shm', $wordData['nomor_shm']);
        $template->setValue('nib', $wordData['nib_tanah']);
        $template->setValue('detail_lanjutan', $wordData['detail_lanjutan']);
        $template->setValue('nama_perumahan', $wordData['nama_perumahan']);
        $template->setValue('luas', $wordData['luas_rencana_pembangunan']);
        $template->setValue('tanggal_survei', Carbon::parse($wordData['tanggal_survei'])->translatedFormat('d F Y'));
        $template->setValue('wilayah_pembangunan', $wordData['wilayah_pembangunan']);
        $template->setValue('nomor_itr', $wordData['nomor_itr']);
        $template->setValue('tanggal_itr', Carbon::parse($wordData['tanggal_itr'])->translatedFormat('d F Y'));
        $template->setValue('peruntukan_kawasan', $wordData['peruntukan_kawasan']);

        // Add image to the document
        if ($wordData['ttd_pengembang']) {
            $imagePath = public_path('storage/' . $wordData['ttd_pengembang']);
            if (file_exists($imagePath)) {
                $template->setImageValue('ttd_pengembang', ['path' => $imagePath, 'width' => 150, 'height' => 35, 'ratio' => false]);
            }
        }
        if ($wordData['ttd_perencana']) {
            $imagePath = public_path('storage/ttd_perencanas/' . $wordData['ttd_perencana']);
            if (file_exists($imagePath)) {
                $template->setImageValue('ttd_perencana', ['path' => $imagePath, 'width' => 150, 'height' => 30, 'ratio' => false]);
            }
        }
        if ($wordData['ttd_staff']) {
            $imagePath = public_path('storage/' . $wordData['ttd_staff']);
            if (file_exists($imagePath)) {
                $template->setImageValue('ttd_staff', ['path' => $imagePath, 'width' => 150, 'height' => 30, 'ratio' => false]);
            }
        }
        if ($wordData['ttd_kabid']) {
            $imagePath = public_path('storage/' . $wordData['ttd_kabid']);
            if (file_exists($imagePath)) {
                $template->setImageValue('ttd_kabid', ['path' => $imagePath, 'width' => 150, 'height' => 35, 'ratio' => false]);
            }
        }
        if ($wordData['ttd_kadin']) {
            $imagePath = public_path('storage/' . $wordData['ttd_kadin']);
            if (file_exists($imagePath)) {
                $template->setImageValue('ttd_kadin', ['path' => $imagePath, 'width' => 150, 'height' => 60, 'ratio' => false]);
            }
        }
        if ($wordData['rancangan_steplan']) {
            $imagePath = public_path('storage/rancangan_steplans/' . $wordData['rancangan_steplan']);
            if (file_exists($imagePath)) {
                $template->setImageValue('rancangan_steplan', ['path' => $imagePath, 'width' => 700, 'height' => 650, 'ratio' => false]);
            }
        }

        if ($wordData['rancangan_potongan']) {
            $imagePath = public_path('storage/rancangan_potongans/' . $wordData['rancangan_potongan']);
            if (file_exists($imagePath)) {
                $template->setImageValue('rancangan_potongan', ['path' => $imagePath, 'width' => 700, 'height' => 650, 'ratio' => false]);
            }
        }

        if ($wordData['denah']) {
            $imagePath = public_path('storage/denahs/' . $wordData['denah']);
            if (file_exists($imagePath)) {
                $template->setImageValue('denah', ['path' => $imagePath, 'width' => 700, 'height' => 650, 'ratio' => false]);
            }
        }

        if ($wordData['lokasi']) {
            $imagePath = public_path('storage/lokasis/' . $wordData['lokasi']);
            if (file_exists($imagePath)) {
                $template->setImageValue('lokasi', ['path' => $imagePath, 'width' => 700, 'height' => 650, 'ratio' => false]);
            }
        }

        $fileName = 'temporary_document_' . uniqid() . '.docx';
        $filePath = storage_path('app/public/' . $fileName);
        $template->saveAs($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function getPengajuanDetails($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return response()->json($pengajuan);
    }
}
