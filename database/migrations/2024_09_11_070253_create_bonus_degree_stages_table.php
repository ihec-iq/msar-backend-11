<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bonus_degree_stages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bonus_degree_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('bonus_stage_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->double('salery')->default(0);
            $table->integer('yearly_bounues');
            $table->integer('yearly_service');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonus_degree_stages');
    }
};
