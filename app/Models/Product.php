<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['name','description','price','state','category_id'];
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scores()
    {
        return $this->hasMany(Score::class);
    }
    public function score()
    {
        $scores = $this->scores;
        $total = $scores->sum('score');
        $count = $scores->count();
        if ($count == 0) {
            return 0;
        } else {
            $average = round($total / $count, 2);
            return $average;
        }
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
