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
        Schema::create('tweets', function (Blueprint $table) {
            //tweetsテーブルに必要なカラムを追加
            $table->id();
            $table->bigInteger('user_id'); 
            $table->string('user_name');
            $table->string('fname')->nullable();
            $table->string('title')->nullable();
            $table->string('problem');
            $table->string('solution');
            $table->integer('impression')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tweets');
    }
};
