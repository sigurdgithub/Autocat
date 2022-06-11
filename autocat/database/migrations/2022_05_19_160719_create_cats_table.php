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
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->string('gender')->nullable();
            $table->string('name')->required();
            $table->date('dateOfBirth')->nullable();
            $table->string('breed')->nullable();
            $table->string('furColor')->nullable();
            $table->string('furLength')->nullable();
            $table->string('chipNumber')->nullable();
            $table->string('adoptionStatus')->required();
            $table->string('notifierName')->nullable();
            $table->string('notifierPhone')->nullable();
            $table->string('socialization')->nullable();
            $table->integer('startWeight')->nullable();
            $table->string('sterilized')->nullable();
            $table->string('extraInfo')->nullable();
            $table->string('medication')->nullable();
            $table->string('personality')->nullable();
            $table->string('solo')->nullable();
            $table->string('withPet')->nullable();
            $table->string('gardenAccess')->nullable();
            $table->integer('buddyId')->default(0);
            $table->string('image')->nullable();
            $table->integer('fosterFamily_id')->nullable();
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
        Schema::dropIfExists('cats');
    }
};
