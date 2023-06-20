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
        Schema::table('users', function (Blueprint $table) {
            //「sail artisan make:migration add_テーブル名_table --table=テーブル名」 にて、現存テーブルへのカラムの追加
            $table->string('user_id',32);
            $table->string('fname',128)->nullable();
            $table->text('bio')->nullable();
            $table->integer('admin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
