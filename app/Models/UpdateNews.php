<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateNews extends Model
{
    use HasFactory;
    protected $fillable=['type','source'];
}
