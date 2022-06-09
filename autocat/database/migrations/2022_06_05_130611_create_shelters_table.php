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
            $table->string('shelterFirstName');
            $table->string('shelterLastName');
            $table->date('shelterDateOfBirth');
            $table->string('shelterStreet');
            $table->string('shelterNumber');
            $table->string('shelterCity');
            $table->string('shelterZipCode');
            $table->string('phoneNumber');
            $table->string('website');
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
