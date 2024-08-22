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
        Schema::create('participants_sports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sports_id')->constrained('sports')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('participants_id')->constrained('participants')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('status',['active','not_active']);
            $table->integer('subscriptionOne_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants_sports');
    }
};
