<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['title', 'thumbnail', 'short_description', 'game_url', 'genre', 'platform', 'publisher', 'developer', 'release_date', 'profile_url'];
}
