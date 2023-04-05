<?php

namespace App\Modules\Admin\Heroes\Controllers;

use \App\Http\Controllers\Controller;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Increment\IncrementEnergy;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Increment\IncrementFirewall;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Increment\IncrementInterface;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Increment\IncrementLife;
use App\Modules\Admin\Heroes\Controllers\Actions\Count\Increment\IncrementSkill;
use App\Modules\Admin\Heroes\Models\Heroes;
use App\Modules\Admin\Heroes\Requests\IncrementStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class IncrementController extends Controller
{
    public function __invoke(IncrementStoreRequest $request,Heroes $hero,IncrementInterface $increment):RedirectResponse
    {

        switch ($request->increment) {
            case 'life':
                $increment = app(IncrementLife::class);
                break;
            case 'energy':
                $increment = app(IncrementEnergy::class);
                break;
            case 'firewall':
                $increment = app(IncrementFirewall::class);
                break;
            case 'skill':
                $increment = app(IncrementSkill::class, ['params' => ['skill_id' => $request->skill_id]]);
                break;
            default:
                return abort(500);
        }

        $increment->increment($hero);

        return redirect()->route('heroes.read',$hero->id)->with(['message' => 'Успешно']);
    }
}
