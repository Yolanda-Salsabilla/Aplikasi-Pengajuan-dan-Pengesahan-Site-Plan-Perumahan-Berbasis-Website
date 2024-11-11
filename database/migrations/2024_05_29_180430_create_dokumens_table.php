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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->bigIncrements('id_dokumens');
            $table->unsignedBigInteger('persetujuans_id');
            $table->foreign('persetujuans_id')
            ->references('id_persetujuans')
            ->on('persetujuans')
            ->onDelete('cascade');
            $table->string('dokumen')->nullable();
            $table->string('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
