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
        Schema::create('to_dos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 150)->nullable(false);
            $table->text('description')->nullable(true);
            $table->timestamp('completed_at')->nullable(true);
            $table->timestamp('due_at')->nullable(true);
            $table->integer('priority')->default(0);
            $table->foreignId('user_id')->nullable(false)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('to_dos');
    }
};
