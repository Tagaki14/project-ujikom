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
        Schema::create('detail_kamar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kamar_id');
            $table->string('nomor');
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->timestamps();
            $table->foreign('kamar_id')->references('id')->on('kamar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kamar');
    }
};
