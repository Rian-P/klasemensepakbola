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
        Schema::create('klasemen', function (Blueprint $table) {
            $table->id();
            $table->string('tim');
            $table->integer('main');
            $table->integer('menang');
            $table->integer('seri');
            $table->integer('kalah');
            $table->integer('gol_masuk');
            $table->integer('gol_kebobolan');
            $table->integer('selisih_gol');
            $table->integer('poin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasemen');
    }
};
