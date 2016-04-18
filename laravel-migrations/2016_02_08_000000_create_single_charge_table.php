<?php
use Illuminate\Database\Migrations\Migration;

class CreateSingleChargeTable extends Migration
{
    public function up()
    {
        Schema::create('single_charge', function($table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('single_purchase_id')->unsigned()->index();
            $table->decimal('amount', 5, 2)->unsigned();
            $table->string('shopify_charge_reference', 64);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('single_charge');
    }
}