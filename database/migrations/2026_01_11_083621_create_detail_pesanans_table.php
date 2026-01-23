<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesanan_id');
            $table->string('id_menu', 10);
            $table->integer('qty');
            $table->integer('harga_satuan');
            $table->integer('subtotal');
            $table->timestamps();

            $table->foreign('pesanan_id')->references('id')->on('pesanan')->onDelete('cascade');
            $table->foreign('id_menu')->references('id_menu')->on('menu');
        });
    }
    public function down(): void { Schema::dropIfExists('detail_pesanan'); }
};
