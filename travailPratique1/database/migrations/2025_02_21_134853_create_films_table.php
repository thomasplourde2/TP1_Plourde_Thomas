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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->year('release_year', 4);
            $table->unsignedSmallInteger('length', 3);
            $table->text('description');
            $table->enum('rating', ['G', 'PG', 'PG-13', 'R', 'NC-17']);
            $table->unsignedBigInteger('language_id', 11);
            $table->string('special_features', 200);
            $table->string('image', 40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
