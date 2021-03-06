<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Storage;

class Blog extends Model
{
    use HasFactory;

    protected $casts = [
        'is_open' => 'boolean',
    ];

    protected $guarded = [];

    protected static function booted()
    {
        static::deleting(function ($blog){
            $blog->deletePictFile();

            //$blog->comments()->delete();

            $blog->comments->each(function ($comment) {
                $comment->delete();
            });
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => '(ιδΌθ)'
        ]);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->oldest();
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }


    public function scopeOnlyOpen($query)
    {
        return $query->where('is_open',true);
    }

    public function deletePictFile()
    {
        if ($this->pict){
            Storage::disk('public')->delete($this->pict);
        }
    }
}
