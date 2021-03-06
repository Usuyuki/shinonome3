<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            //null禁止なのはタイムスタンプ、リメンバートークン、名前、IDのみ。他はnullおっけい
            $table->increments('id');

            $table->string('name')->comment('twitterの名前から取得');
            $table->string('explain')->nullable()->comment('自己紹介');
            $table->string('twitter_name')->nullable()->comment('twitterの@名前');
            $table->string('twitter_token')->nullable()->comment('twitterのトークン');
            $table->string('profile_photo_path')->nullable()->comment('twitterアイコンのURL');
            $table->string('original_profile_photo_path')->nullable()->comment('オリジナルアイコン用のパス置き場');
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable()->change();
            $table->unsignedInteger('set1')->nullable()->comment('設定1');
            $table->unsignedInteger('set2')->nullable()->comment('設定1');
            $table->rememberToken(); //（twitterのトークンがあるため必要性がそもそもないが今後会員登録採用のために枠だけ残しておく)
            $table->timestamps();

            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->nullable(false)->change();
        });
    }
}
