<?php

namespace App\Modules\Admin\User\Controllers\Actions\UpdateHero;

interface UpdateHeroInUserInterface
{


    public function updateHero(object $user, string $id);
}
