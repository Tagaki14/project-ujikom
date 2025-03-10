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
        Schema::create('detail_reservasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservasi_id');
            $table->unsignedBigInteger('detail_kamar_id');
            $table->string('tamu');
            $table->timestamp('tgl_checkin')->nullable();
            $table->timestamp('tgl_checkout')->nullable();
            $table->enum('status',['checkin','checkout']);
            $table->timestamps();
            $table->foreign('reservasi_id')->references('id')->on('reservasi');
            $table->foreign('detail_kamar_id')->references('id')->on('detail_kamar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_reservasi');
    }
};
