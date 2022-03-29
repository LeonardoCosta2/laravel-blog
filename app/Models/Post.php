<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);

        // ou pode ser usado assim:
        //return $this->belongsTo('App\Models\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category', 'posts_categories', 'post', 'category');
    }
}
