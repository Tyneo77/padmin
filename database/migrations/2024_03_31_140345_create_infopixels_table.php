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
        Schema::create('infopixels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('medicalname')->nullable();
            $table->text('description')->nullable();
            $table->text('hint')->nullable();
            $table->integer('level')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infopixels');
    }
};
