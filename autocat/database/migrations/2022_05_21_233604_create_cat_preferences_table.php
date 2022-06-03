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
        Schema::create('catpreferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')->unique();
            $table->boolean('bottleFeeding')->nullable();
            $table->boolean('pregnancy')->nullable();
            $table->boolean('intensiveCare')->nullable();
            $table->boolean('noIntensiveCare')->nullable();
            $table->boolean('isolation')->nullable();
            $table->boolean('kids')->nullable();
            $table->boolean('dogs')->nullable();
            $table->boolean('cats')->nullable();
            $table->boolean('lapCat')->nullable();
            $table->boolean('playfulCat')->nullable();
            $table->boolean('outdoorCat')->nullable();
            $table->boolean('calmCat')->nullable();
            $table->boolean('bedroomAccess')->nullable();
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
        Schema::dropIfExists('catpreferences');
    }
};
