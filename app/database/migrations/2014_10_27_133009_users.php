<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

    protected $tableName = 'users';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists($this->tableName);

        Schema::create($this->tableName, function ($t) {
            $t->increments('id');
            $t->string('email', 100);
            $t->string('username')->nullable();
            $t->string('password', 128);
            $t->string('remember_token', 100)->nullable();
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
