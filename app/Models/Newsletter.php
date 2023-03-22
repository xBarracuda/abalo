<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Newsletter extends Model
{
    protected $table = 'newsletter';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'email'
    ];

}
