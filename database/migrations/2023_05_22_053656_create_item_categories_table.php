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
        Schema::create('item_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->foreignId('user_create_id')->constrained(table: 'users', indexName: 'idCreateCategory')->onUpdate('cascade')->onDelete('cascade')->default('1');
            $table->foreignId('user_update_id')->constrained(table: 'users', indexName: 'idUpdateCategory')->onUpdate('cascade')->onDelete('cascade')->default('1');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_categories');
    }
};
