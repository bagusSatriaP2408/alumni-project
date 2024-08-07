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
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('jenis_pekerjaan_id');
            $table->unsignedBigInteger('vendor_id');
            $table->date('mulai_bekerja')->nullable();
            $table->date('selesai_bekerja')->nullable();
            $table->boolean('done')->nullable();

            $table->foreign('jenis_pekerjaan_id')->references('id_jenis_pekerjaan')->on('jenis_pekerjaans')->constrained();
            $table->foreign('user_id')->references('id')->on('users')->constrained();
            $table->foreign('vendor_id')->references('id')->on('vendors')->constrained();
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
