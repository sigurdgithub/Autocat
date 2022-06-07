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
        Schema::create('foster_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fosterFamily_id')->default(0)->nullable();
            $table->integer('adult')->default(0)->nullable();
            $table->integer('pregnant')->default(0)->nullable();
            $table->integer('kitten')->default(0)->nullable();
            $table->integer('bottleFeeding')->default(0)->nullable();
            $table->integer('scared')->default(0)->nullable();
            $table->integer('feral')->default(0)->nullable();
            $table->integer('intensiveCare')->default(0)->nullable();
            $table->integer('noIntensiveCare')->default(0)->nullable();
            $table->integer('isolation')->default(0)->nullable();
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
        Schema::dropIfExists('foster_preferences');
    }
};
