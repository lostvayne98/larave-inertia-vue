<?php

namespace App\Modules\Admin\Heroes\Controllers\Actions;

use App\Modules\Admin\Heroes\Models\Heroes;

class CreateHeroHackSkillAction
{
    public function handle(object $hero, array $data)
    {
        if (!empty($data['hack_skills'])) {

            $hero->hack_skills()->skill()->associate($data['combat_skills']);

        }
    }
}
