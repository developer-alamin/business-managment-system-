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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->enum('account_type',['cash','mobile_bank','bank']);
            $table->char('account_name')->nullable();
            $table->char('account_number')->nullable();
            $table->char('account_branch')->nullable();
            $table->char('opening_account')->nullable();
            $table->char('note')->nullable();
            $table->enum('status',['active','inactive']);
            $table->date('date');
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
        Schema::dropIfExists('payment__methods');
    }
};
