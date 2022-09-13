<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Facades\Hash;

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
            $table->id();
            $table->string('name');
            $table->string('kana');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number')->unique()->comment('電話番号');
            $table->string('postcode')->comment('郵便番号');
            $table->string('prefecture_id')->comment('都道府県番号');
            $table->string('city')->comment('市町村');
            $table->string('address')->comment('市町村以下');
            $table->string('remark')->nullable();
            $table->rememberToken();
            $table->timestamps();

        });

        \DB::table('users')->insert([
            ['id' => 1, 'name' => '管理者', 'kana'=> 'カンリシャ', 'email' => 'test@test', 'password' =>bcrypt('password'), 'phone_number' =>'000-0000-0000', 'postcode' =>'000-0000', 'prefecture_id' => 13, 'city' => '港区', 'address' => '芝公園4丁目2-8'  ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
