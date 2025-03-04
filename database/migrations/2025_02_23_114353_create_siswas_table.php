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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nik_siswa');
            $table->foreign('nik_siswa')->references('nik')->on('users')->onDelete('cascade');
            $table->string('nik_wali');
            $table->foreign('nik_wali')->references('nik')->on('users')->onDelete('cascade');
            $table->foreignId('sekolah_id')->constrained('tempat_pendampingan');
            $table->string('jurusan')->nullable();
            $table->foreignId('persoalan_pendidikan_id')->constrained('persoalan_pendidikan');
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
        Schema::dropIfExists('siswa');
    }
};
