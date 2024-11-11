<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\DokumenFotoController;
use App\Http\Controllers\DokumenSementaraController;
use App\Http\Controllers\HistorysController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PengembanganController;
use App\Http\Controllers\PengesahanController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    return view('layout.main');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth', 'verified');
    Route::resource('pengajuan', PengajuanController::class);
    Route::resource('pengesahan', PengesahanController::class);
    Route::resource('persetujuan', PersetujuanController::class);
    Route::resource('dokumen', DokumenController::class);
    Route::get('/persetujuanadmin', [PersetujuanController::class, 'persetujuanadmin'])->name('persetujuanadmin');
    Route::get('/persetujuanteknis', [PersetujuanController::class, 'persetujuanteknis'])->name('persetujuanteknis');
    Route::get('/persetujuan/{persetujuan}/edit', [PengajuanController::class, 'edit1'])->name('edit1');

    Route::middleware([CheckRole::class.':admin,kabid,kadin'])->group(function () {
        Route::get('/persetujuandokumen', [PersetujuanController::class, 'persetujuandokumen'])->name('persetujuandokumen');
        Route::get('/pengembangan', [PengembanganController::class, 'index'])->name('pengembangan.index');
        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    });
    Route::middleware([CheckRole::class.':admin'])->group(function () {
        Route::match(['get', 'post'], '/dokumen', [DokumenSementaraController::class, 'index'])->name('dokumen.index');
        Route::post('/dokumen/updateWord', [DokumenSementaraController::class, 'updateWord'])->name('dokumen.updateWord');
        Route::get('/dokumen/downloadWord', [DokumenSementaraController::class, 'downloadWord'])->name('dokumen.downloadWord');
        Route::get('/history', [HistorysController::class, 'index'])->name('history');
        Route::patch('/user/{id}', [UserController::class, 'update'])->name('updateuser');
        Route::get('/pengajuan/{id}', [DokumenSementaraController::class, 'getPengajuanDetails']);
        Route::post('/dokumen/uploadWord', [DokumenSementaraController::class, 'uploadWord'])->name('dokumen.uploadWord');
        Route::post('/dokumen/generateWord', [DokumenSementaraController::class, 'generateWord'])->name('dokumen.generateWord');
        Route::post('/dokumen/generateDocx', [DokumenSementaraController::class, 'generateDocx'])->name('dokumen.generateDocx');
        Route::delete('/user--delete{id}', [UserController::class, 'destroy'])->name('deleteuser');
        Route::patch('/status-update-admin-{id}', [PersetujuanController::class, 'updateStatusAdmin'])->name('statusadmin.update');
        Route::patch('/status-update-teknis-{id}', [PersetujuanController::class, 'updateStatusTeknis'])->name('statusteknis.update');
        Route::patch('/uploadDocument/{id}', [DokumenController::class, 'uploadDocument'])->name('uploadDocument');
        Route::patch('/uploadDocumentResmi/{id}', [PengesahanController::class, 'uploadDocumentResmi'])->name('uploadDocumentResmi');
        Route::patch('/keterangan-admin-{id}', [PersetujuanController::class, 'addKeteranganAdmin'])->name('keteranganadmin.add');
        Route::patch('/keterangan-update-admin-{id}', [PersetujuanController::class, 'updateKeteranganAdmin'])->name('keteranganadmin.update');
        Route::patch('/keteranganteknis/add/{id}', [PersetujuanController::class, 'addKeteranganTeknis'])->name('keteranganteknis.add');
        Route::patch('/keteranganteknis/update/-{id}', [PersetujuanController::class, 'updateKeteranganTeknis'])->name('keteranganteknis.update');
        Route::patch('pengajuan/update-ttd-staff/{id}', [PengajuanController::class, 'updateTtdStaff'])->name('ttdstaff.update');
    });

    Route::middleware([CheckRole::class.':admin,kabid,kadin'])->group(function () {
        Route::post('/cetak-pdf', [LaporanController::class, 'cetak'])->name('cetak.pdf');
        Route::post('/cetak-pdffoto', [DokumenFotoController::class, 'cetak'])->name('cetak.pdffoto');
        Route::get('/dokumenfoto', [DokumenFotoController::class, 'index'])->name('dokumenfoto');
        Route::patch('pengajuan/update-ttd-kabid/{id}', [PengajuanController::class, 'updateTtdKabid'])->name('ttdkabid.update');
        Route::patch('pengajuan/update-ttd-kadin/{id}', [PengajuanController::class, 'updateTtdKadin'])->name('ttdkadin.update');
    });

    // Other routes
    Route::patch('/update-pengajuan-admin-{id_pengajuan}', [PengajuanController::class, 'updateAdmin'])->name('updateKet.admin');
    Route::patch('/update-pengajuan-teknis/{id_pengajuan}', [PengajuanController::class, 'updateTeknis'])->name('updateKet.teknis');
    Route::delete('/pengajuan--delete{id_pengajuan}', [PengajuanController::class, 'destroy'])->name('deletepengajuan');
});

require __DIR__.'/auth.php';
