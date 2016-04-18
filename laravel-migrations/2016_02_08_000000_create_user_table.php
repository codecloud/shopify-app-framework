<?php
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('user', function($table) {
            $table->increments('id')->unsigned();
            $table->string('shop_url')->unique();
            $table->string('display_name');
            $table->string('email_address', 255);
            $table->string('access_token', 100);
            $table->timestamp('last_logged_in_at');
            $table->timestamps();
        });
    }
}