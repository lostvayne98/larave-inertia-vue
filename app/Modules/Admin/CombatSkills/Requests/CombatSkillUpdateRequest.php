<?php

namespace App\Modules\Admin\CombatSkills\Requests;

use Illuminate\Support\Facades\Auth;

class CombatSkillUpdateRequest extends \Illuminate\Foundation\Http\FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->role('admin') || Auth::user()->role('super_admin')) {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'alpha | required',
            'rarity' => 'alpha | required'
        ];
    }
}
