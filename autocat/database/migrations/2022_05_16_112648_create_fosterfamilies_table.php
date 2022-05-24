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
        Schema::create('fosterFamilies', function (Blueprint $table) {
            $table->id();
            $table->string('lastName');
            $table->string('firstName');
            $table->date('dateOfBirth');
            $table->string('street');
            $table->string('number');
            $table->string('city');
            $table->string('zipCode');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('availableSpots');
            $table->string('preferences');
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
        Schema::dropIfExists('fosterfamilies');
    }
};
