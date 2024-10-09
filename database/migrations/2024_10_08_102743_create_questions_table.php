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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');
            // $table->foreignId('author_id')->constrained(
            //     table: 'users',
            //     indexName: 'post_author_id'
            // );
            // $table->foreignId('category_id')->constrained(
            //     table: 'categories',
            //     indexName: 'post_category_id'
            // );
            $table->integer('user_id');
            $table->integer('tag_id');
            $table->integer('votes')->default(0);
            $table->integer('answers')->default(0);
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
