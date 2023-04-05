<?php

namespace App\Modules\Admin\Heroes\Controllers\Actions\Count\Decrement;

class DecrementSkill implements DecrementInterface
{
    private $skill_id;

    public function __construct(array $params = [])
    {

        $this->skill_id = $params['skill_id'] ?? null;

    }

    public function decrement(object $hero)
    {

        $skill = $hero->skills()->whereId($this->skill_id)->first();
        $skill->amount--;
        $skill->save();
    }
}
