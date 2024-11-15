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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->enum('income_type',['seles','others']);
            $table->string('seles_type');
            $table->foreignId('product_id');
            $table->foreign("product_id")
            ->references('id')
            ->on('products')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('payment_method_id');
            $table->foreign("payment_method_id")
            ->references('id')
            ->on('payment_methods')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->char('payment_info');
            $table->integer('amount');
            $table->date('date');
            $table->text('description')->nullable();
            $table->timestamp('created_at')
            ->useCurrent();
            $table->timestamp('updated_at')
            ->useCurrent()
            ->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
