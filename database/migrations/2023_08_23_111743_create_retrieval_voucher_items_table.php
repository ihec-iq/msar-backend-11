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
        Schema::create('retrieval_voucher_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('retrieval_voucher_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('item_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('employee_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('input_voucher_item_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('retrieval_voucher_item_type_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            // $table->unsignedBigInteger('retrieval_voucher_itemable_id');
            // $table->string('retrieval_voucher_itemable_type');
            $table->integer('count')->nullable();
            $table->integer('price')->nullable();
            $table->bigInteger('value')->nullable();
            $table->text('notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retrieval_voucher_items');
    }
};
