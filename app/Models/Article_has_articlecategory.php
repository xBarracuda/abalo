<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article_has_articlecategory extends Model
{
    use HasFactory;

    protected $table = "ab_article_has_articlecategory";

    protected $primaryKey = "id";

    public $timestamps = true;
}
