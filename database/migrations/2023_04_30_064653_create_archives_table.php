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
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->dateTime('issue_date')->nullable();
            $table->string('number')->nullable();
            $table->string('way')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_in')->nullable()->default(true);
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('archive_type_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            //$table->foreignId('section_id')->constrained()->onUpdate('cascade')->onDelete('cascade');  // added in separate migration
            //$table->foreignId('archive_type_id')->constrained()->onUpdate('cascade')->onDelete('cascade'); // added in separate migration
            $table->foreignId('user_create_id')->constrained(table: 'users', indexName: 'idCreate')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_update_id')->constrained(table: 'users', indexName: 'idUpdate')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};
