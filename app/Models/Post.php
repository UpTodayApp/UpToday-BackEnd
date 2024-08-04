<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "post";

    public function comentario()
    {
        return $this->hasMany(Post::class);
    }

    public function megusta()
    {
        return $this->hasMany(Post::class);
    }

    public function usuario()
    {
        return $this->belongsTo(usuario::class);
    }
}
