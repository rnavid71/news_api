<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsApi extends Model
{
    use HasFactory;
    protected $table = 'news_api';
    protected $fillable = ['title', 'description', 'url', 'author', 'source', 'published_at'];

}
