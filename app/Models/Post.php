<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'author_id',
        'category_id',
        'post_title',
        'post_slug',
        'post_cotent',
        'featured_image'
    ];

    public function sluggable(): array
    {
        return [
            'post_slug' => [
                'source' => 'post_title'
            ]
        ];
    }

    public function scopeSearch($query, $term){
        $term   =   "%$term%";

        $query->where(function($query) use ($term){
            $query->where('post_title', 'like', $term);
        });

    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class, 'category_id', 'id');
    }

    public function author(){
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
