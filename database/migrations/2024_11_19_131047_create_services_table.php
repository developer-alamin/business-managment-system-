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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->foreignId('doctor_id');
            $table->foreign("doctor_id")
            ->references('id')
            ->on('doctors')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('member_id');
            $table->foreign("member_id")
            ->references('id')
            ->on('members')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('product_id');
            $table->foreign("product_id")
            ->references('id')
            ->on('products')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('service_type_id');
            $table->foreign("service_type_id")
            ->references('id')
            ->on('service_types')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->string('note')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
