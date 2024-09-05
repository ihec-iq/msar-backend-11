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
        Schema::create('direct_voucher_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('direct_voucher_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('item')->constrained()->nullable();
            $table->foreignId('employee_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('count')->nullable();
            $table->integer('price')->nullable();
            $table->bigInteger('value')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('user_create_id')-> constrained(table: 'users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_update_id')-> constrained(table: 'users')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direct_voucher_items');
    }
};
