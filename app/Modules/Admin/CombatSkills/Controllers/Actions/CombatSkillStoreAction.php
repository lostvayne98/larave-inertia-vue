<?php

namespace App\Modules\Admin\CombatSkills\Controllers\Actions;

use App\Modules\Admin\CombatSkills\Models\CombatSkills;

class CombatSkillStoreAction
{
    public function handle(array $data)
    {
        CombatSkills::create($data);
    }
}
