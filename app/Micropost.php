<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content', 'user_id'];
    
    public function user()
    {
      return $this->belongsTo(User::class);
    }
    
    public function favirite_users()
    {
      return $this->belongsToMany(User::class);
    }
}
