<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    protected $table = 'ab_user';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'ab_name',
        'ab_password',
        'ab_mail'
    ];

    protected $hidden = [
        'ab_password'
    ];

}
