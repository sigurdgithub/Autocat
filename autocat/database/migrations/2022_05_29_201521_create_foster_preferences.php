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
            $table->foreignId('fosterFamily_id')->default(0);
            $table->boolean('adult')->default(0);
            $table->boolean('pregant')->default(0);
            $table->boolean('kitten')->default(0);
            $table->boolean('bottleFeeding')->default(0);
            $table->boolean('scared')->default(0);
            $table->boolean('feral')->default(0);
            $table->boolean('intensiveCare')->default(0);
            $table->boolean('noIntensiveCare')->default(0);
            $table->boolean('isolation')->default(0);
            $table->$table->timestamps();
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
