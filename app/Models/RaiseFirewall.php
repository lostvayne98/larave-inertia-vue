<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaiseFirewall extends Model
{
    use HasFactory;
    protected $fillable = [
        'hero_id',
        'user_id',
        'description',
        'app',
    ];

    public function Heroes() {

        return $this->belongsTo(Heroes::class,'hero_id','id');

    }

    public function Users() {

        return $this->belongsTo(User::class,'user_id','id');
    }
}
