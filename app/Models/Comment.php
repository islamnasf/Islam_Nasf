<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Comment extends Model
{
    public $table="comments";
    public function articles(){

        return $this->belongTo('App.Models.Article');

    }
    
}
