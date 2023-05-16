<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'subcategory_name',
        'slug',
        'parent_category',
        'ordering'
    ];

    public function category(){
      return $this->belongsTo(Category::class, 'parent_category', 'id');  
    }

    public function posts(){
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
