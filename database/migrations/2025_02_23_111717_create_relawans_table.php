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
        Schema::create('relawan', function (Blueprint $table) {
            $table->id();
            $table->string('nik_relawan')->unique();
            $table->foreign('nik_relawan')->references('nik')->on('users')->onDelete('cascade');
            $table->string('jabatan')->nullable();
            $table->string('no_anggota')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relawan');
    }
};
