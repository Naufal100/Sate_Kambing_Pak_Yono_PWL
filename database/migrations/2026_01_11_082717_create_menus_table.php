<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('menu', function (Blueprint $table) {
            $table->string('id_menu', 10)->primary(); 
            $table->string('nama_menu', 50);
            $table->enum('kategori', ['makanan', 'minuman']);
            $table->integer('harga');
            $table->integer('rating')->default(5);
            $table->integer('stok');
            $table->string('deskripsi_menu', 255);
            $table->string('foto_menu')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('menu'); }
};
