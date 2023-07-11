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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sekolah_id')->nullable();
            $table->text('jumlah_siswa')->nullable();
            $table->string('no_surat')->nullable();
            $table->text('perihal')->nullable();
            $table->string('kepala_sekolah')->nullable();
            $table->string('nip')->nullable();
            $table->string('status')->nullable();
            $table->text('lampiran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
