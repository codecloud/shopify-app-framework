<?php
use Illuminate\Database\Migrations\Migration;

class CreateSinglePurchaseTable extends Migration
{
    public function up()
    {
        Schema::create('single_purchase', function($table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('single_product_id')->unsigned();
            $table->enum('status', ['ACTIVE', 'INACTIVE']);
            $table->date('last_charged_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema:;drop('single_purchase');
    }
}