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
        Schema::create('user_permission', function (Blueprint $table) {
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('permissions_id')->constrained('permissions')->onDelete('cascade');
            $table->primary(['users_id', 'permissions_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_permission');
    }
};
