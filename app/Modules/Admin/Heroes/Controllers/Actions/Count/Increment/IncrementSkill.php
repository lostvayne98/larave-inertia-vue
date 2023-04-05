<?php

namespace App\Modules\Admin\Heroes\Controllers\Actions\Count\Increment;

use App\Modules\Admin\HeroAmount\Models\HeroAmount;

class IncrementSkill implements IncrementInterface
{
    private $skill_id;

    public function __construct(array $params = [])
    {

        $this->skill_id = $params['skill_id'] ?? null;

    }

    public function increment(object $hero):void
    {

        $skill = $hero->skills()->whereId($this->skill_id)->first();
        $skill->amount++;
        $skill->save();
    }
}
