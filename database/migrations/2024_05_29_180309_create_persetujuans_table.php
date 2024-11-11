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
        Schema::create('persetujuans', function (Blueprint $table) {
            $table->bigIncrements('id_persetujuans');
            $table->unsignedBigInteger('pengajuans_id');
            $table->foreign('pengajuans_id')
                ->references('id_pengajuans')
                ->on('pengajuans')
                ->onDelete('cascade');
            $table->string('ttd_kabid')->nullable();
            $table->string('ttd_kadin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persetujuans');
    }
};
