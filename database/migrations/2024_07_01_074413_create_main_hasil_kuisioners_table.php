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
        Schema::create('main_hasil_kuisioner', function (Blueprint $table) {
            $table->id('id_main_hasil_kuisioner');
            $table->string('inputan');
            $table->unsignedBigInteger('id_kuisioner');
            $table->timestamps();
            $table->foreign("id_kuisioner")->references("id_kuisioner")->on("kuisioner")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_hasil_kuisioners');
    }
};
