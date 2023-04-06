<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Article extends Model
{
    protected $table = 'ab_article';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'ab_name',
        'ab_price',
        'ab_description'
    ];

}
