<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Pengesahan;
use App\Models\User;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
public function index()
{
    $user = User::count();
    $user1 = User::where('role', 'user')->count();
    $pengajuan = Pengajuan::count();

    
    $pengesahan = Pengesahan::whereNotNull('dokumen_resmi')->where('dokumen_resmi', '!=', '')->count();

    $totalpdanp = $user1 + $pengajuan;

    
    $userId = auth()->user()->id_users;

    
    $pengajuanUser = Pengajuan::where('users_id', $userId)->count();

    
    $pengesahanUser = Pengesahan::where('users_id', $userId)
        ->whereNotNull('dokumen_resmi')
        ->where('dokumen_resmi', '!=', '')
        ->count();

    return view('dashboard.index', compact('user', 'pengajuan', 'pengesahan', 'totalpdanp', 'pengajuanUser', 'pengesahanUser'));
}


}
