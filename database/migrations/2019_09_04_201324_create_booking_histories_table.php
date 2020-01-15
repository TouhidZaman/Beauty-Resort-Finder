<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('single_bedrooms');
            $table->integer('double_bedrooms');
            $table->integer('total_cost');
            $table->integer('resort_id')->unsigned();
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('booking_histories');
    }
}
