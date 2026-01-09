<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('store_logs', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->foreignId('player_id')->nullable()->constrained()->nullOnDelete();
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('store_logs');
    }
};
