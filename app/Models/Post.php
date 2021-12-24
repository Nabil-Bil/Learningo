<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'content',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function files()
    {
        return $this->hasMany(Path::class);
    }
}
