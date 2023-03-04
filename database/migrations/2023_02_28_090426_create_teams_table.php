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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('short_name', 50)->unique();
            $table->string('city', 50);
            $table->enum('serie', ['A', 'B', 'C'])->default('A');
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('points')->default(0);
            $table->tinyInteger('goal_difference')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
