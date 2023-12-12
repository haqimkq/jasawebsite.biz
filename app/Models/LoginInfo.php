<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginInfo extends Model
{
    use HasFactory;
    protected $table = 'login_infos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'url',
        'username',
        'password',
    ];
}
