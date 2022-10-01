<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','slug'];

    public function getRouteKeyName(){
        return "slug";
    }
    //Una categoria tiene muchos POsts
    //Relación 1 a *
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
