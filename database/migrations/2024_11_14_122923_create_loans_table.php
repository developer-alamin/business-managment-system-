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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investor_id');
            $table->foreign("investor_id")
            ->references('id')
            ->on('investors')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('payment_method_id');
            $table->foreign("payment_method_id")
            ->references('id')
            ->on('payment_methods')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->enum('type',['loan','loan_return']);
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
        Schema::dropIfExists('loans');
    }
};
