<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postnews extends Model
{
    public function categoryinfo(){
        return $this->belongsTo('App\Models\Category', 'news_category', 'category_id');
    }
    use HasFactory;
}
