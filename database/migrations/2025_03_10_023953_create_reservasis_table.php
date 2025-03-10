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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kamar_id');
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('kode')->unique();
            $table->enum('status', ['dipesan','dibayar','checkin','selesai','batalkan']);
            $table->text('alasan')->nullable();
            $table->timestamp('tgl_reservasi')->nullable();
            $table->timestamp('tgl_expired')->nullable();
            $table->date('tgl_datang');
            $table->date('tgl_pulang');
            $table->integer('jml_kamar');
            $table->integer('jml_tamu');
            $table->integer('total_bayar');
            $table->timestamps(); 
            $table->timestamp('deleted_at' )->nullable();
            $table->foreign('kamar_id')->references('id')->on('kamar');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggan');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
