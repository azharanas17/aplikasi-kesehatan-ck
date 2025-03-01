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
        Schema::create('surat_kuasa', function (Blueprint $table) {
            $table->id();
            $table->string('nik_pemberi_kuasa');
            $table->foreign('nik_pemberi_kuasa')->references('nik')->on('users')->onDelete('cascade');
            $table->string('hubungan')->nullable();
            $table->string('nik_pasien');
            $table->foreign('nik_pasien')->references('nik')->on('users')->onDelete('cascade');
            $table->string('penyakit')->nullable();
            $table->string('nik_penerima_kuasa_1');
            $table->foreign('nik_penerima_kuasa_1')->references('nik')->on('users')->onDelete('cascade');
            $table->string('nik_penerima_kuasa_2')->nullable();
            $table->foreign('nik_penerima_kuasa_2')->references('nik')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_kuasa');
    }
};
