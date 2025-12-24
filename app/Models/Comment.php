<?php

namespace App\Models;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id', 'news_id'];
    public function news(){
        return $this->belongsTo(News::class);

    }
    public function user(){
        return $this->belongsTo(User::class);

    }


}
