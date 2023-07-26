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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title", 255)->unique();
            $table->string("slug", 255)->unique();
            $table->string("image")->nullable();
            $table->text("content")->nullable();
            $table->timestamp("posted_at");
            $table->timestamp("updated_at")->nullable();
            $table->boolean("show")->default(true);
            $table->foreignId("author_id");

            $table->foreign('author_id')
                ->references('id')
                ->on('accounts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
