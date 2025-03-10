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
        Schema::create('tamu', function (Blueprint $table) {
            $table->id();
            $table->string('no_identitas')->unique();
            $table->string('jenis_identitas');
            $table->string('nama_tamu');
            $table->string('no_hp', 13);
            $table->enum('jk', ['l', 'p']);
            $table->text('alamat');
            $table->enum('status',['aktif','nonaktif'])->default('nonaktif');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tamu');
    }
};
