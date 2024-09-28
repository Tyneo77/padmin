<?php

use App\Models\Collection;
use App\Models\Infopixel;
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
        Schema::create('collection_infopixel', function (Blueprint $table) {
            $table->id();
            $table->integer('index')->default(0);
            $table->text('description')->nullable();
            $table->foreignIdFor(Collection::class)->index();
            $table->foreignIdFor(Infopixel::class)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_infopixel');
    }
};
