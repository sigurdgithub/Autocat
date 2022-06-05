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
        Schema::create('shelters', function (Blueprint $table) {
            $table->id();
            $table->string('shelterName');
            $table->string('shelterPhone');
            $table->string('hkNumber');
            $table->string('firstName');
            $table->string('lastName');
            $table->date('dateOfBirth');
            $table->string('street');
            $table->string('number');
            $table->string('city');
            $table->string('zipCode');
            $table->string('phoneNumber');
            $table->string('picture')->nullable();
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
        Schema::dropIfExists('shelters');
    }
};
