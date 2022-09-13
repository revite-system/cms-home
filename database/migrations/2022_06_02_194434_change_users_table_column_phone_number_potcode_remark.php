<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUsersTableColumnPhoneNumberPotcodeRemark extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        \DB::statement('ALTER TABLE users MODIFY phone_number varchar(14)');
        \DB::statement('ALTER TABLE users MODIFY postcode varchar(8)');
        \DB::statement('ALTER TABLE users  MODIFY COLUMN remark mediumText');
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_phone_number_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unique('users_phone_number_unique');
        });
    }
}
