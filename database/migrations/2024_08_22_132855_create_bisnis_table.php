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
        Schema::create('bisnis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categori_id')->constrained('categoris')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('province_id')->constrained('provinces')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('regenci_id')->constrained('regencies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('nama_bisnis');
            $table->string('email');
            $table->integer('no_hp');
            $table->string('deskripsi');
            $table->string('jambuka')->nullable();
            $table->longText('medsos');
            $table->string('foto_produk');
            $table->string('foto_bisnis');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->enum('status',['terima','tolak','menunggu'])->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bisnis');
    }
};
