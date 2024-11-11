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
        Schema::create('pengesahans', function (Blueprint $table) {
            $table->bigIncrements('id_pengesahans');
            $table->unsignedBigInteger('persetujuans_id');
            $table->foreign('persetujuans_id')
            ->references('id_persetujuans')
            ->on('persetujuans')
            ->onDelete('cascade');
            $table->unsignedBigInteger('users_id');  // Add users_id if related to User
            $table->foreign('users_id')
                ->references('id_users')
                ->on('users')
                ->onDelete('cascade');
            $table->date('tgl_selesai');
            $table->boolean('proses_pengesahan')->default(false);
            $table->string('dokumen_resmi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengesahans');
    }
};
