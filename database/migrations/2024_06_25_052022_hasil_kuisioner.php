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
        Schema::create("hasil_kuisioner", function (Blueprint $table){
            $table->id('id_hasil_kuisioner');
            $table->string('nim');
            $table->unsignedBigInteger('id_kuisioner');
            $table->text('hasil_kuisioner')->nullable();
            $table->foreign("nim")->references("nim")->on("users")->constrained();
            $table->foreign("id_kuisioner")->references("id_kuisioner")->on("kuisioner")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
