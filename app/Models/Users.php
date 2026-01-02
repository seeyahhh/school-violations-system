<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'user';


    protected $fillable = [
        'first_name',
        'last_name',
        'school_id',
        'email',
        'password',
        'role_id',
    ];
}
