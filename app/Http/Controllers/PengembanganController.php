<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;

class PengembanganController extends Controller
{
    public function index() {
    $pengajuan = Pengajuan::get();
    $user = User::where('role', 'user')->get();

    // Gabungkan kedua koleksi
    $gabungan = Pengajuan::with(['user'])->get();

    return view('pengembangan.index', compact('pengajuan', 'user', 'gabungan'));
}

}
