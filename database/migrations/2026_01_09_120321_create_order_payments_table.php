<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('order_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('provider_id')->constrained('payment_providers')->cascadeOnDelete();
            $table->string('transaction_id')->nullable();
            $table->decimal('amount', 15, 2);
            $table->string('currency', 10)->default('USD');
            $table->enum('status', ['PENDING','PAID','FAILED','REFUNDED'])->default('PENDING');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_payments');
    }
};
