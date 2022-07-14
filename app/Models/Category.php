<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function newsinfo(){
        return $this->belongsTo('App\Models\Postnews', 'category_name', 'news_category');
    }
    use HasFactory;
}
