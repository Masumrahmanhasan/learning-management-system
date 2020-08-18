<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
	use Uuid;
    protected $fillable = ['uuid', 'name', 'icon', 'slug', 'status'];

	protected static function boot() {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);

            $count = static::whereRaw("slug RLIKE '^{$category->slug}(-[0-9]+)?$'")->count();

	        // if other slugs exist that are the same, append the count to the slug
	        $category->slug = $count ? "{$category->slug}-{$count}" : $category->slug;
        });
    }
}
