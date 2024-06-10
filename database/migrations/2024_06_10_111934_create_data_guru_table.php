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
        Schema::create('dataguru', function (Blueprint $table) {
            $table->id();
            $table->string('nama_guru');
            $table->string('email')->unique();
            $table->string('nuptk')->unique();
            $table->date('tempat_tanggal_lahir'); 
            $table->string('mengajar'); 
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataguru');
    }
};
