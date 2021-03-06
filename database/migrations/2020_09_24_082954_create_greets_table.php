<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGreetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('greets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('ユーザID');
            $table->string('name')->nullable()->comment('ユーザ名');

            $table->string('greet')->comment('本文');
            //↓これでdeleted atを追加
            $table->softDeletes();

            $table->timestamps();

            //インデックスを作る→検索の高速化に貢献
            $table->index('id');
            $table->index('user_id');
            $table->index('greet');


            //他テーブルと関連付け 外部キー接続を宣言
            //cascade→親テーブルに対して更新を行うと子テーブルで同じ値を持つカラムの値も合わせて更新される
            //つまりユーザー消すとコメントも消せるはず？
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('greets');
    }
}