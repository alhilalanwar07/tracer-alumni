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
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->unique();
            $table->string('foto')->default('no_image.jpg');
            $table->string('judul_skripsi')->nullable();
            $table->decimal('ipk', 3, 2)->nullable();
            $table->string('tahun_masuk')->nullable();
            $table->enum('keterangan', ['belum bekerja', 'sudah bekerja', 'study lanjut'])->default('belum bekerja');
            // user_id
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // wisuda_id
            $table->foreignId('wisuda_id')->constrained()->onDelete('cascade');
            // prodi_id
            $table->foreignId('prodi_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};
