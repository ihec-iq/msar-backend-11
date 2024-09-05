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
        Schema::create('vacation_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacation_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('vacation_reason_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->date('date');
            $table->float('record')->default(0);
            $table->time('time_from');
            $table->time('time_to');
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
        Schema::dropIfExists('vacation_times');
    }
};
