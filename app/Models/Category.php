<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'parent_id','description'];

    // فئة تحتوي على عدة أخبار
    public function news()
    {
        return $this->hasMany(News::class);
    }

    // فئة فرعية تنتمي إلى فئة رئيسية
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // فئة رئيسية تحتوي على فئات فرعية
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
