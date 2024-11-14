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
        Schema::create('investment__collections', function (Blueprint $table) {
            $table->id();

            $table->foreignId('investor_id');
            $table->foreign("investor_id")
            ->references('id')
            ->on('investors')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->char('month');
            $table->year('year');
            $table->integer('amount');
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
        Schema::dropIfExists('investment__collections');
    }
};
