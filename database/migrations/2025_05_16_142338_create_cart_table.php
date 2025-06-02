<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cart', function (Blueprint $table) {
            // UUID sebagai primary key
            $table->uuid('id')->primary();

            // UUID user_id, foreign key ke users.id, cascade on delete/update
            $table->uuid('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            // UUID product_id, foreign key ke products.id, cascade on delete/update
            $table->uuid('product_id');
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            // Quantity sebagai integer
            $table->integer('quantity');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};

