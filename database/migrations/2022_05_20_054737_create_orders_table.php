<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->String('first_name1');
            $table->String('last_name1');
            $table->String('email1');
            $table->String('phone_number1');
            $table->longText('address1');
            $table->longText('address21');
            $table->String('state1');
            $table->String('city1');
            $table->String('zip_code1');
            $table->String('first_name2');
            $table->String('last_name2');
            $table->String('email2');
            $table->String('phone_number2');
            $table->longText('address2');
            $table->longText('address22');
            $table->String('state2');
            $table->String('city2');
            $table->String('zip_code2');
            $table->String('order_status');
            $table->String('payment_type');
            $table->String('payment_status');
            $table->String('payment_id')->nullable();
            $table->Integer('total_amount');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
