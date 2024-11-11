<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengesahan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pengesahans';

    protected $fillable = [
        'persetujuans_id', 'users_id','tgl_selesai', 'proses_pengesahan', 'dokumen_resmi'
    ];

       public function persetujuan()
    {
        return $this->belongsTo(Persetujuan::class, 'persetujuans_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

}
