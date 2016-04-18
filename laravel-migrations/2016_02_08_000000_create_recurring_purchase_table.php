<?php
use Illuminate\Database\Migrations\Migration;

class CreateRecurringPurchaseTable extends Migration
{
    public function up()
    {
        Schema::create('recurring_purchase', function($table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('recurring_product_id')->unsigned();
            $table->integer('shopify_recurring_charge_reference')->unsigned();
            $table->enum('status', ['ACTIVE', 'INACTIVE']);
            $table->date('last_charged_at');
            $table->date('expires_at')->default('1985-02-08');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema:;drop('recurring_purchase');
    }
}