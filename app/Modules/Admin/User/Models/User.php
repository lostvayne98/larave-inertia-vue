<?php

namespace App\Modules\Admin\User\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Filter\Filterable;
use App\Modules\Admin\User\Models\SettersUser\UserSetters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Modules\Admin\User\Models\Relations\HasOneRelation;
use Spatie\Permission\Traits\HasRoles;
use App\Filter\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasOneRelation,HasRoles,Filterable,UserSetters;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    //protected  $guard_name = 'web';


    protected $fillable = [
        'name',
        'email',
        'password',
        'hero_id'
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime:Y-m-d h:i:s',
    ];


}