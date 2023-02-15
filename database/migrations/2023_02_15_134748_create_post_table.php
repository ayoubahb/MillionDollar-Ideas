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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('categoryId');
            $table->string('file');
            $table->foreign('userId')
                ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('categoryId')
                ->references('id')->on('category')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
