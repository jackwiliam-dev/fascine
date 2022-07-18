<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function images() {
        return $this->hasMany(ProductImage::class, 'productId');
    }

    public function tags() {
        return$this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'product_categories', 'productId', 'categoryId')->withTimestamps();
    }
}
