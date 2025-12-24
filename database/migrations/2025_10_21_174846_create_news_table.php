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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id')->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->nullOnDelete();

            $table->string('slug')->unique();
            $table->longText('content');
            $table->string('image')->nullable();
            $table->string('video_url')->nullable();
            $table->integer('views')->default(0);
            $table->boolean('is_breaking')->default(false);
            $table->longText('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
