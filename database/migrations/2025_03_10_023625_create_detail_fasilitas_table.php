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
        Schema::create('detail_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kamar_id');
            $table->unsignedBigInteger('fasilitas_kamar_id');
            $table->timestamps();
            $table->foreign('kamar_id')->references('id')->on('kamar');
            $table->foreign('fasilitas_kamar_id')->references('id')->on('fasilitas_kamar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_fasilitas');
    }
};
