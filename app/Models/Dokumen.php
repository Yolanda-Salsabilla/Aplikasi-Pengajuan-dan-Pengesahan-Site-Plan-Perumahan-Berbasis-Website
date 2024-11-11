<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_dokumens';

    protected $fillable = [
        'persetujuans_id', 'dokumen', 'status'
    ];

    public function persetujuan()
    {
        return $this->belongsTo(persetujuan::class, 'persetujuans_id');
    }
}
