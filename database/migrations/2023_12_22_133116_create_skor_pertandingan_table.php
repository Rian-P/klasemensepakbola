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
        Schema::create('skor_pertandingan', function (Blueprint $table) {
            $table->id();
            $table->string('tim_a');
            $table->integer('skor_a');
            $table->integer('skor_b');
            $table->string('tim_b');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skor_pertandingan');
    }
};
