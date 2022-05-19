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
            $table->string('gender');
            $table->string('name');
            $table->date('dateOfBirth');
            $table->string('breed');
            $table->string('furColor');
            $table->string('furLength');
            $table->string('chipNumber');
            $table->string('adoptionStatus');
            $table->string('notifierName');
            $table->string('notifierPhone');
            $table->string('socialization');
            $table->integer('startWeight');
            $table->string('sterilized');
            $table->string('extraInfo')->default('');
            $table->string('medication')->default('');
            $table->string('personality')->default('');
            $table->string('solo')->default('');
            $table->string('withPet')->default('');
            $table->string('withBuddy')->default('');
            $table->string('gardenAccess')->default('');
            $table->integer('buddyId')->default(0);
            $table->string('image')->default('');
            $table->integer('fosterFamily_id')->default(0);
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
