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
        Schema::create('user_hrs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->date('issue_date')->nullable();
            $table->foreignId('employee_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('degree_stage_id')->constrained('bonus_degree_stages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('study_id')->constrained('bonus_studies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('job_title_id')->constrained('bonus_job_titles')->onUpdate('cascade')->onDelete('cascade');
            $table->string('number_last_bonus')->nullable();
            $table->date('date_last_bonus')->nullable();
            $table->date('date_next_bonus')->nullable();
            $table->string('number_last_promotion')->nullable();
            $table->date('date_last_promotion')->nullable();
            $table->date('date_next_promotion')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_hrs');
    }
};
