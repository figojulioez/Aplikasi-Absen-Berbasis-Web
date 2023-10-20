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
        Schema::create('data_absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id');
            // $table->integer('time')->nullable();
            // $table->string('jamMasuk')->nullable();
            // $table->string('jamPulang')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_absensis');
    }
};
