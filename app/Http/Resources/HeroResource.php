<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HeroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'faculty' => $this->faculty,
            'course' => $this->cource,
            'rank' => $this->rank,
            'bio' => $this->bio,
            'quests' => $this->quests,
            'photo' => $this->photo,
            'life' => $this->life,
            'energy' => $this->energy,
            'firewall' => $this->firewall,
            'user' => new UserResource($this->user_id),
            'hack_skills' => new HackSkills($this->hack_skills),
            'combat_skills' => new CombatSkills($this->combat_skills),
        ];
    }
}
