<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'api_users';

    protected $fillable = [
        'username',
        'is_active'
    ];
}