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
        Schema::table('respon_kuisioners', function (Blueprint $table) {
            $table->foreignId('kategori_id')->nullable()->constrained('kategori_kuisioners')->onDelete('set null');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('respon_kuisioners', function (Blueprint $table) {
            //
        });
    }
};
