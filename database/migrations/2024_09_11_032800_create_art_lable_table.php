<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('art_lable', function (Blueprint $table) {
            $table->foreignId('arts_id')->constrained('arts')->onDelete('cascade');
            $table->foreignId('lables_id')->constrained('lables')->onDelete('cascade');
            $table->primary(['arts_id', 'lables_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('art_lable');
    }
};
