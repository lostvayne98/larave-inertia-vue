<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('name');
            $table->string('faculty');
            $table->string('course');
            $table->string('rank');
            $table->string('bio')->nullable();
            $table->string('quests')->nullable();
           /* $table->string('hack_skills_id');
            $table->string('combat_skills_id');*/
            $table->string('photo')->nullable();
            $table->string('life')->default(1);
            $table->string('energy')->default(1);
            $table->string('firewall')->default(1);
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
        Schema::dropIfExists('heroes');
    }
}
