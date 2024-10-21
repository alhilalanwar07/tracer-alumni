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
        Schema::create('kuisioners', function (Blueprint $table) {
            $table->id();
            $table->text('pertanyaan');
            $table->enum('tipe_pertanyaan', ['text', 'multiple_choice', 'scale', 'checkbox', 'dropdown']);
            $table->text('pilihan_jawaban')->nullable(); // Jika tipe multiple_choice, checkbox, atau dropdown
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuisioners');
    }
};
