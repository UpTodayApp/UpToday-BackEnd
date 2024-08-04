<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "comentario";

    public function Post()
    {
        return $this->belongsTo(Post::class);
    }
    public function megusta()
    {
        return $this->hasMany(comentario::class);
    }

    public function usuario()
    {
        return $this->belongsTo(usuario::class);
    }
}
