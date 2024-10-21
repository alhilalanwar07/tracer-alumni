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
        Schema::create('kategori_kuisioners', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->timestamps();
        });

        // Tambahkan kolom kategori_id di tabel kuisioner
        Schema::table('kuisioners', function (Blueprint $table) {
            $table->foreignId('kategori_id')->nullable()->constrained('kategori_kuisioners')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop kolom kategori_id dari kuisioners
        Schema::table('kuisioners', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });

        Schema::dropIfExists('kategori_kuisioners');
    }
};
