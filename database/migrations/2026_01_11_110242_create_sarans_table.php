<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        
        Schema::dropIfExists('saran');

        Schema::create('saran', function (Blueprint $table) {
            $table->id('id_saran'); 
            $table->unsignedBigInteger('id_user');
            $table->text('isi');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('pelanggan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('saran');
    }
};
