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
        Schema::create('ulasan_kamar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservasi_id');
            $table->text('ulasan');
            $table->integer('rating');
            $table->timestamps();
            $table->foreign('reservasi_id')->references('id')->on('reservasi')->cascadeOnDelete()   ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan_kamar');
    }
};
