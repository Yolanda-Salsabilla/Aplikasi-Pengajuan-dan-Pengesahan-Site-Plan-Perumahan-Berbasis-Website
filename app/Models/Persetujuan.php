<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persetujuan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_persetujuans';

    protected $fillable = [
        'pengajuans_id', 'ttd_kabid', 'ttd_kadin'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuans_id');
    }

    public function pengesahan()
    {
        return $this->hasOne(Pengesahan::class, 'persetujuans_id');
    }

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'persetujuans_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
