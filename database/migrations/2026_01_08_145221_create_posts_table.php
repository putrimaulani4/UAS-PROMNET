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
        Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('judul');             // Atribut judul [cite: 20]
        $table->text('isi');                // Atribut isi [cite: 20]
        $table->string('penulis');           // Atribut penulis [cite: 20]
        $table->timestamp('tanggal_publikasi'); // Atribut tanggal publikasi [cite: 20]
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
