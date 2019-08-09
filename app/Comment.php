<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment', 'nippo_id'];
    
    public function nippo()
    {
        return $this->belongsTo(Nippoe::class);
    }
}