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
        Schema::create('hasil_kuisioner_vendors', function (Blueprint $table) {
            $table->id('id_hasil_kuisioner_vendor');
            $table->unsignedBigInteger('id_kuisioner');
            $table->unsignedBigInteger('id_main_hasil_kuisioner')->nullable();
            $table->unsignedBigInteger('vendor_id');
            
            $table->foreign("vendor_id")->references("id")->on("vendors")->constrained();
            $table->foreign("id_main_hasil_kuisioner")->references("id_main_hasil_kuisioner")->on("main_hasil_kuisioner")->constrained();
            $table->foreign("id_kuisioner")->references("id_kuisioner")->on("kuisioner")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_kuisioner_vendors');
    }
};
