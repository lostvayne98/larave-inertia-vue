<?php

namespace App\Modules\Admin\CombatSkills\Controllers\Actions;

use App\Modules\Admin\CombatSkills\Models\CombatSkills;

class CombatSkillUpdateAction
{
    public function handle(CombatSkills $skill,array $data)
    {
        $skill->update($data);
    }
}
