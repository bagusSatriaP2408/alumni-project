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
            $table->unsignedInteger('user_id');
            $table->string('nama_pekerjaan')->nullable();
            $table->string('alamat_perusahaan')->nullable();
            $table->date('mulai_bekerja')->nullable();
            $table->date('selesai_bekerja')->nullable();
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
