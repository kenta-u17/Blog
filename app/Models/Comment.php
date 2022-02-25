<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class)->oldest();
    }

    protected $fillable = ['name', 'body','blog_id'];

    protected static function booted()
    {
        static::deleting(function ($comment){
            logger("delete" .$comment->id);
        });
    } 
}
