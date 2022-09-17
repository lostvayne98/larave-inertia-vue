<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CombatSkills extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'combat_skill_id' => $this->hack_skills_id,
            'hero_id' => $this->hero_id,
            'amount' => $this->amount
        ];
    }
}
