<?php

namespace App\Modules\Admin\Heroes\Controllers\Actions;

use App\Modules\Admin\CombatSkills\Models\CombatSkills;
use App\Modules\Admin\Heroes\Models\Heroes;

class CreateHeroCombatSkillAction
{

    public function handle(object $hero, array $data)
    {
        if (!empty($data['combat_skills'])) {
            $hero->combat_skills()->skill()->associate($data['combat_skills']);

        }
    }
}
