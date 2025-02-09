<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = static::generateSlug($category->name);
        });

        static::updating(function ($category) {
            if ($category->isDirty('name')) {
                $category->slug = static::generateSlug($category->name);
            }
        });
    }

    private static function generateSlug($name)
    {
        $slug = Str::slug($name);
        $count = Category::where('slug', 'LIKE', "$slug%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function latestNews()
    {
        return $this->hasOne(News::class)->latest();
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
