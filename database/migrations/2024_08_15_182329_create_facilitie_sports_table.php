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
        Schema::create('facilitie_sports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sports_id')->constrained('sports')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('facilities_id')->constrained('facilities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilitie_sports');
    }
};
