<?php
use Illuminate\Database\Migrations\Migration;

class CreateSingleProductTable extends Migration
{
    public function up()
    {
        Schema::create('single_product', function($table) {
            $table->increments('id')->unsigned();
            $table->string('display_name');
            $table->string('slug');
            $table->string('description');
            $table->decimal('amount', 5, 2)->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('single_product');
    }
}