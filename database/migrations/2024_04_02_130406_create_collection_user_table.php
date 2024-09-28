<?php

use App\Models\Collection;
use App\Models\User;
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
        Schema::create('collection_user', function (Blueprint $table) {
            $table->id();
            $table->integer('index')->default(0)->index();
            $table->foreignIdFor(Collection::class)->index();
            $table->foreignIdFor(User::class)->index();
            $table->integer('score')->default(0)->index();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_user');
    }
};
