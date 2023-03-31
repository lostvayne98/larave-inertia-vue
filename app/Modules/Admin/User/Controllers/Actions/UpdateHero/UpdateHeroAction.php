<?php

namespace App\Modules\Admin\User\Controllers\Actions\UpdateHero;

use App\Modules\Admin\Heroes\Models\Heroes;

class UpdateHeroAction implements UpdateHeroInUserInterface
{

    public function updateHero(object $user, string $id)
    {
        Heroes::query()->whereId($id)->update([
           'user_id' => $user->id
        ]);
    }
}
