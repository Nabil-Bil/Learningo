<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Salon extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function users()
    {
       return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function member()
    {
      return $this->belongsToMany(User::class)->wherePivot('user_id',Auth::user()->id);
    }

    public function specific_member($id)
    {
      return $this->belongsToMany(User::class)->wherePivot('user_id',$id);
    }

    public function posts()
    {
      return $this->hasMany(Post::class)->orderBy('created_at','DESC');
    }

    public function comments()
    {
      return $this->hasManyThrough(Post::class,Comment::class);
    }
    
}
