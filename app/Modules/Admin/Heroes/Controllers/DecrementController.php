<?php

namespace App\Modules\Admin\Heroes\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Decrement\DecrementEnergy;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Decrement\DecrementFirewall;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Decrement\DecrementInterface;

use App\Modules\Admin\Heroes\Controllers\Actions\Count\Decrement\DecrementLife;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Decrement\DecrementSkill;
use App\Modules\Admin\Heroes\Models\Heroes;
use App\Modules\Admin\Heroes\Requests\DecrementRequest;
use Illuminate\Http\RedirectResponse;

class DecrementController extends Controller
{
    public function __invoke(DecrementRequest $request,Heroes $hero,DecrementInterface $decrement):RedirectResponse
    {
        switch ($request->decrement) {
            case 'life':
                $decrement = app(DecrementLife::class);
                break;
            case 'energy':
                $decrement = app(DecrementEnergy::class);
                break;
            case 'firewall':
                $decrement = app(DecrementFirewall::class);
                break;
            case 'skill':
                $decrement = app(DecrementSkill::class,['params' => ['skill_id' => $request->skill_id]]);
                break;
            default :
               return abort(500);
        }

        $decrement->decrement($hero);

        return redirect()->route('heroes.read',$hero->id)->with(['message' => 'Успешно']);

    }
}
