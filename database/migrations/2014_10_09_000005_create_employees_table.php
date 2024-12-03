<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_person')->default(true);
            $table->foreignId('section_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->default(1);
            $table->boolean('is_move_section')->default(false);
            $table->foreignId('move_section_id')->constrained('sections')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->default(1);
            $table->foreignId('employee_center_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->default(1);
            $table->foreignId('user_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade')->default(1);
            $table->foreignId('employee_position_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->default(1);
            $table->foreignId('employee_type_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->default(1);
            $table->string('id_card')->nullable();
            $table->string('number')->nullable();
            $table->string('telegram')->nullable();
            $table->date('date_work')->nullable();
            $table->double('init_vacation')->nullable()->default(0);
            $table->double('take_vacation')->nullable()->default(0);
            $table->double('init_vacation_sick')->nullable()->default(0);
            $table->double('take_vacation_sick')->nullable()->default(0);
            $table->foreignId('degree_stage_id')->default(56)->constrained('bonus_degree_stages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('study_id')->default(1)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('certificate_id')->default(1)->constrained('certificates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('bonus_job_title_id')->default(1)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('number_last_bonus')->nullable();
            $table->date('date_last_bonus')->nullable()->default(now());
            $table->date('date_next_bonus')->nullable()->default(Carbon::now()->addYears(1));
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
