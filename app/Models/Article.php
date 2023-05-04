<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;


class Article extends Model
{
    use HasFactory;
    public $table="articles";
    public function comments(){
        return $this->hasMany('App.Models.Comment');

    }
    public function users(){
        return $this->belongTo('App.Models.User');

    }
}
