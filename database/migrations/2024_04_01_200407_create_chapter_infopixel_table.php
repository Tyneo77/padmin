<?php

use App\Models\Chapter;
use App\Models\Infopixel;
use Doctrine\DBAL\Schema\Index;
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
        Schema::create('chapter_infopixel', function (Blueprint $table) {
            $table->id();
            $table->integer('index')->default(0)->index();
            $table->foreignIdFor(Chapter::class)->index();
            $table->foreignIdFor(Infopixel::class)->index();
            $table->text('description')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapter_infopixel');
    }
};
