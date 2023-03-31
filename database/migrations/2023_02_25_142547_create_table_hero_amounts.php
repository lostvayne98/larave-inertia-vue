<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Modules\Admin\Heroes\Models\Heroes;
use App\Modules\Admin\User\Models\User;
use App\Modules\Admin\Skills\Models\Skill;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_amounts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Skill::class);
            $table->foreignIdFor(Heroes::class);
            $table->integer('amount')->default(1);
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
        Schema::dropIfExists('table_hero_amounts');
    }
};
