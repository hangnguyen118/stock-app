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
        Schema::create('arts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('galleries_id')->constrained('galleries')->onDelete('cascade');
            $table->string('title');
            $table->text('descriptions');
            $table->unsignedBigInteger('price');
            $table->string('display');
            $table->boolean('watemark');
            $table->unsignedBigInteger('dowload');
            $table->unsignedBigInteger('view');
            $table->unsignedBigInteger('like');
            $table->unsignedBigInteger('favourites');
            $table->unsignedInteger('comment');
            $table->string('url_cover_image');
            $table->string('url_preview_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arts');
    }
};
