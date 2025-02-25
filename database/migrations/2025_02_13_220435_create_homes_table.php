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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->json('seo');
            $table->json('first_block')->nullable();
            $table->json('two_block')->nullable();
            $table->json('three_block')->nullable();
            $table->json('four_block')->nullable();
            $table->json('five_block')->nullable();
            $table->json('six_block')->nullable();
            $table->json('seven_block')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
