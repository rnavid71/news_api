<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuardianNews extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'news_id', 'section_id', 'section_name', 'title', 'url', 'published_at'];
}
