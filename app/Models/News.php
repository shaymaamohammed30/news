<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
     protected $fillable = ['title', 'content', 'category_id', 'user_id'];

    // الخبر ينتمي إلى فئة واحدة
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // الخبر ينتمي إلى مستخدم (كاتب)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
