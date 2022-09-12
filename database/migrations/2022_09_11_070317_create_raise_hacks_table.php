<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaiseHacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raise_hacks', function (Blueprint $table) {
            $table->id();
            $table->string('hero_id');
            $table->string('user_id');
            $table->string('description');
            $table->string('skill_hack');
            $table->boolean('application');
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
        Schema::dropIfExists('raise_hacks');
    }
}
