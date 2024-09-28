<?php

use App\Models\Chapter;
use App\Models\Ctype;
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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->integer('index')->default(0)->index();
            $table->timestamps();
            $table->string('name');
            $table->string('medicalname')->nullable();
            $table->text('description')->nullable();
            $table->integer('level')->default(0)->index();
            $table->string('image')->nullable();
            $table->foreignIdFor(Chapter::class)->index();
            $table->foreignIdFor(Ctype::class)->index();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
