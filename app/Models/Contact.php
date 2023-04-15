<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = "contact";

    protected $primaryKey = "id";

    protected $fillable = [
        'ab_name',
        'ab_mail',
        'ab_text'
    ];
}
