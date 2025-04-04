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
            $table->integer('release_year');
            $table->unsignedSmallInteger('length');
            $table->text('description');
            $table->enum('rating', ['G', 'PG', 'PG-13', 'R', 'NC-17']);
            $table->unsignedBigInteger('language_id');
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
