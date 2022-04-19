<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;


class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function find($slug) {
        $path = resource_path("posts/{$slug}.html");

        if (! file_exists($path)) {
          throw new ModelNotFoundException();
        }

        return file_get_contents($path);

    }
}
