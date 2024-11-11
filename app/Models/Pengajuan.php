<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $primaryKey = 'id_pengajuans';
    use HasFactory;

    protected $fillable = [
        'users_id', 'nama_perumahan', 'alamat', 'tipe', 'jumlah', 'latitude', 'longitude',
        'tanggal_masuk', 'permohonan_pengesahan', 'sbu', 'surat_ktp', 'npwp_perusahaan',
        'akta', 'sspt_pbblunas', 'sertif', 'slujk', 'dok_lingkungan', 'siup_situ_nib',
        'info_pupr', 'statusadmin', 'statusteknis', 'rancangan_steplan', 'denah', 'lokasi', 'ttd_perencana', 'rancangan_potongan','nama_perencana'
    ];

      public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function persetujuan()
    {
        return $this->hasOne(Persetujuan::class, 'pengajuans_id');
    }

     public function dokumen()
    {
        return $this->hasOne(Dokumen::class, 'persetujuans_id');
    }

    protected static function booted()
    {
        static::created(function ($pengajuan) {
            // Create related 'persetujuans' entry
            $persetujuan = Persetujuan::create([
                'pengajuans_id' => $pengajuan->id_pengajuans,
                // Other default values can be set here
            ]);

            // Create related 'pengesahans' entry
            Pengesahan::create([
                'persetujuans_id' => $persetujuan->id_persetujuans,
                'users_id'=> auth()->user()->id_users,
                'tgl_selesai' => now(), // Default value, you can adjust
                // Other default values can be set here
            ]);

            // Create related 'dokumens' entry
            Dokumen::create([
                'persetujuans_id' => $persetujuan->id_persetujuans, // Default value, you can adjust
                'status' => false,
                // Other default values can be set here
            ]);
        });
    }
}
