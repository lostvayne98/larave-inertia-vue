<?php

namespace App\Modules\Admin\User\Requests;
use \Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FilterRequest extends FormRequest
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
            'created_at' => 'nullable | date',
            'id' => 'nullable | String',
            'orderBy' => 'nullable'
        ];
    }
}
