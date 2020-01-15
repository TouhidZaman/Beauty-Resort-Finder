<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resorts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('location');
            $table->string('resort_image')->nullable();
            $table->integer('single_bed');
            $table->integer('single_bed_cost');
            $table->string('single_bed_sample')->nullable();
            $table->integer('double_bed');
            $table->integer('double_bed_cost');
            $table->string('double_bed_sample')->nullable();
            $table->boolean('active_status')->default(false);
            $table->integer('resort_category_id')->unsigned();
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
        Schema::dropIfExists('resorts');
    }
}
