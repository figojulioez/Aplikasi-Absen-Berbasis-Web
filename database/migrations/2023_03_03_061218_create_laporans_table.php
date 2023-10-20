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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id');
            $table->string('waktuKerja')->nullable();
            $table->string('jamMasuk');
            $table->string('jamPulang')->nullable();
            $table->string('keterangan');
            $table->string('dataShift');  
            $table->boolean('overtime')->nullable();
            $table->integer('time');
            $table->timestamp('tanggalReport');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
