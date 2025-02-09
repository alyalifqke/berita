<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'image', 'category_id', 'views'];

    protected $dates = ['created_at', 'updated_at'];

       // Override default key
       public function getRouteKeyName()
       {
           return 'slug';
       }

      public static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $news->slug = static::generateSlug($news->title);
        });

        static::updating(function ($news) {
            if ($news->isDirty('title')) { // Cek jika title berubah
                $news->slug = static::generateSlug($news->title);
            }
        });
    }

    private static function generateSlug($title)
    {
        $slug = Str::slug($title);
        $count = News::where('slug', 'LIKE', "$slug%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'news_id');
    }
}
