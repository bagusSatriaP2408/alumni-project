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
        Schema::create("kuisioner", function (Blueprint $table){
            $table->id('id_kuisioner');
            $table->unsignedBigInteger('id_main_kuisioner');
            $table->string('kuisioner')->nullable();
            $table->foreign("id_main_kuisioner")->references("id_main_kuisioner")->on("main_kuisioner")->constrained();
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
