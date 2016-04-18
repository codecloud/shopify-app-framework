<?php
use Illuminate\Database\Migrations\Migration;

class CreateRecurringChargeTable extends Migration
{
    public function up()
    {
        Schema::create('recurring_charge', function($table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('purchase_id')->unsigned()->index();
            $table->decimal('amount', 5, 2);
            $table->string('shopify_charge_reference', 64);
            $table->timestamps();
        });
    }
}