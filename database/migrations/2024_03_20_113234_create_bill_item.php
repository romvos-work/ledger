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
        Schema::create('bill_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billId')
                ->references('id')
                ->on('bill')
                ->cascadeOnUpdate()
                ->cascadeOnDelete()
            ;
            $table->foreignId('productId')
                ->references('id')
                ->on('product')
                ->cascadeOnUpdate()
                ->cascadeOnDelete()
            ;
            $table->unsignedFloat('amount')->nullable();
            $table->unsignedFloat('price')->nullable();
            $table->unsignedFloat('priceTotal')->nullable();
            $table->unsignedTinyInteger('discount')->nullable();
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updatedAt')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_item');
    }
};
