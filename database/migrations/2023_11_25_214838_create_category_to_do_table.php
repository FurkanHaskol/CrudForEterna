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
        Schema::create('category_to_do', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable(false)->constrained();
            $table->foreignId('to_do_id')->nullable(false)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_to_do');
    }
};
