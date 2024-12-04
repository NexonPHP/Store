<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->foreignId('category_id');
            $table->decimal('price');
            $table->decimal('discounted_price');
            $table->integer('quantity');
            $table->dateTime('date_added');
            $table->string('status');
            $table->json('images');
            $table->text('tags');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->json('custom_attributes');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
