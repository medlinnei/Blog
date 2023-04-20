<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("content");
            $table->timestamps();

            $table->unsignedBigInteger("category_id")->nullable();
            $table->index("category_id", "post_category_idx");

            $table->foreign("category_id", "post_category_fk")
                ->on("category")
                ->references("id");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
