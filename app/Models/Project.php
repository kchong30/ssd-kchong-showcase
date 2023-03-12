<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }



    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'url',
        'published_date',
        'image',
        'thumb',
        'category_id'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'projects_tags', 'projects_id', 'tags_id');
    }
}
