<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->bigIncrements('id_pengajuans');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')
            ->references('id_users')
            ->on('users')
            ->onDelete('cascade');
            $table->string('nama_perumahan');
            $table->string('alamat');
            $table->string('tipe');
            $table->integer('Jumlah');
            $table->decimal('latitude', 10, 8);  // 10 total digits, 8 after the decimal point
            $table->decimal('longitude', 11, 8); // 11 total digits, 8 after the decimal point
            $table->date('tanggal_masuk');
            $table->string('permohonan_pengesahan');
            $table->string('sbu');
            $table->string('surat_ktp');
            $table->string('npwp_perusahaan');
            $table->string('akta');
            $table->string('sspt_pbblunas');
            $table->string('sertif');
            $table->string('slujk');
            $table->string('dok_lingkungan');
            $table->string('siup_situ_nib');
            $table->string('info_pupr');
            $table->boolean('statusadmin')->default(false);
            $table->boolean('statusteknis')->default(false);
            $table->string('rancangan_steplan');
            $table->string('rancangan_potongan');
            $table->string('denah');
            $table->string('lokasi');
            $table->string('ttd_perencana');
            $table->string('keterangan_admin')->nullable();
            $table->string('keterangan_teknis')->nullable();
            $table->boolean('ket_update_administrasi')->default(false);
            $table->boolean('ket_update_teknis')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
