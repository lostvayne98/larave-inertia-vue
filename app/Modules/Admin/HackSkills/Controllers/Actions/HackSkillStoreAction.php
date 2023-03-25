<?php

namespace App\Modules\Admin\HackSkills\Controllers\Actions;

use App\Modules\Admin\HackSkills\Models\HackSkill;

class HackSkillStoreAction
{

    public function handle(array $data,$model)
    {
        $model::create($data);
    }

}
