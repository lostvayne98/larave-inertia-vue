<?php

namespace App\Modules\Admin\Skills\Controllers\Actions;

class CreateAmountSkillAction
{
    public function handle(object $hero,$data)
    {
        $hero->skills();
    }
}
