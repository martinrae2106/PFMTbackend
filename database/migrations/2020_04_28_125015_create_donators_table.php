<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullName');
            $table->string('emailAddress');
            $table->string('postalCode')->nullable();
            $table->string('billingAddress1')->nullable();
            $table->string('billingAddress2')->nullable();
            $table->string('cityTown')->nullable();
            $table->string('region')->nullable();
            $table->boolean('emailContactApproved')->nullable();
            $table->string('childName')->nullable();
            $table->string('teacherName')->nullable();
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
        Schema::dropIfExists('donators');
    }
}
