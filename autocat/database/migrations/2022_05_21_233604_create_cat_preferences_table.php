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
        Schema::create('cat_preferences', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id')->default(0);
            $table->boolean('bottleFeeding')->default(0);
            $table->boolean('pregnancy')->default(0);
            $table->boolean('intensiveCare')->default(0);
            $table->boolean('noIntensiveCare')->default(0);
            $table->boolean('isolation')->default(0);
            $table->boolean('kids')->default(0);
            $table->boolean('dogs')->default(0);
            $table->boolean('cats')->default(0);
            $table->boolean('lapCat')->default(0);
            $table->boolean('playfulCat')->default(0);
            $table->boolean('outdoorCat')->default(0);
            $table->boolean('calmCat')->default(0);
            $table->boolean('bedroomAccess')->default(0);
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
        Schema::dropIfExists('cat_preferences');
    }
};
