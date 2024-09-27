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
            $table->foreignId('customers_id')->constrained('customers')->onDelete('cascade');
            $table->string('title');
            $table->text('descriptions');
            $table->unsignedBigInteger('price')->default(0);
            $table->string('display');
            $table->boolean('watemark');
            $table->unsignedBigInteger('dowload')->default(0);
            $table->unsignedBigInteger('view')->default(0);
            $table->unsignedBigInteger('like')->default(0);
            $table->unsignedBigInteger('favourites')->default(0);
            $table->unsignedInteger('comment')->default(0);
            $table->string('url_cover_image')->default(null);
            $table->string('url_preview_image')->default(null);
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
