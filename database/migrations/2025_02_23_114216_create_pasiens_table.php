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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nik_pasien');
            $table->foreign('nik_pasien')->references('nik')->on('users')->onDelete('cascade');
            $table->string('no_rm')->nullable();
            $table->string('nik_keluarga_pendamping');
            $table->foreign('nik_keluarga_pendamping')->references('nik')->on('users')->onDelete('cascade');
            $table->foreignId('rumah_sakit_id')->constrained('tempat_pendampingan');
            $table->foreignId('jenis_layanan_id')->constrained('jenis_layanan');
            $table->date('tanggal_masuk');
            $table->time('jam_masuk');
            $table->foreignId('rujukan_id')->constrained('tempat_pendampingan');
            $table->string('diagnose')->nullable();
            $table->string('status_jaminan')->nullable();
            $table->string('poli')->nullable();
            $table->string('ruangan')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('nik_relawan_pendamping');
            $table->foreign('nik_relawan_pendamping')->references('nik')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
