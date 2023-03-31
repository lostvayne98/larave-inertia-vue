<?php

namespace App\Modules\Admin\Heroes\Controllers\Actions;



class CreateAmountSkills
{
    public function handle($hero,array $data):object
    {
        if (!empty($data['combat_skills'])) {
            foreach ($data['combat_skills'] as $combat) {

                $hero->skills()->create([
                    'skill_id' => $combat
                ]);
            }
        }
        if (!empty($data['hack_skills'])) {
            foreach ($data['hack_skills'] as $hack) {

                $hero->skills()->create([
                    'skill_id' => $hack
                ]);
            }
        }
        return  $hero;
    }
}
