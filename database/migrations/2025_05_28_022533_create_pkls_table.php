<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;




return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pkls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('industri_id')->constrained()->onDelete('cascade');
             $table->foreignId('guru_id')->nullable()->constrained()->onDelete('set null');
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->timestamps();
        });
    }




    public function down(): void
    {
        Schema::dropIfExists('pkls');
    }
};







