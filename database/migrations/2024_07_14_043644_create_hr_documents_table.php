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
        Schema::create('hr_documents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('number')->nullable();
            $table->date('issue_date')->nullable();
            $table->foreignId('employee_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->default(1);
            $table->foreignId('hr_document_type_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('add_days')->default(0);
            $table->integer('add_months')->default(0);
            $table->foreignId('user_create_id')->constrained(table: 'users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_update_id')->constrained(table: 'users')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hr_documents');
    }
};
