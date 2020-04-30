<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('donator_id')->unsigned()->default(1);
            $table->foreign('donator_id')
                  ->references('id')->on('donators');
            $table->bigInteger('school_id')->unsigned()->default(1);
            $table->foreign('school_id')
                  ->references('id')->on('schools');
            $table->bigInteger('region_id')->unsigned()->default(1);
            $table->foreign('region_id')
                  ->references('id')->on('regions');
            $table->float('donationValue');
            $table->string('stripeToken')->nullable();
            $table->integer('transactionStatus')->nullable();
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
        Schema::dropIfExists('donations');
    }
}
