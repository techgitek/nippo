<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nippoe extends Model
{
    protected $fillable = ['nippo', 'user_id'];
     
    public function comments()
    {
        return $this->hasMany(Comment::class, 'nippo_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
