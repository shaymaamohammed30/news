<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
     protected $fillable = ['title', 'content', 'category_id', 'user_id','slug','type', 'image', 'video_url', 'views', 'is_breaking'];

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
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}

