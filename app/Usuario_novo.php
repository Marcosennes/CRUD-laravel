<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_novo extends Model
{
    protected $fillable = [
        'username',
        'email',
        'password'
    ];
}
