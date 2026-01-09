<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('product_commands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('command');
            $table->enum('run_as', ['CONSOLE', 'PLAYER'])->default('CONSOLE');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_commands');
    }
};
