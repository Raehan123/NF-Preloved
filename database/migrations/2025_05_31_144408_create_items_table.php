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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('username');
            $table->string('no_telp');
            $table->string('instagram');
            $table->string('notes');
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->string('category');
            $table->decimal('price', 10,2);
            $table->boolean('is_sold')->default(false);
            $table->boolean('is_favorited')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
