<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Modules\Admin\User\Models\User;
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
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->string('name');
            $table->string('faculty');
            $table->string('course');
            $table->string('rank');
            $table->string('bio')->nullable();
            $table->string('quests')->nullable();
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
