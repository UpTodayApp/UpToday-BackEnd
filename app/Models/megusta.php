<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class megusta extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "megusta";

    public function Post()
    {
        return $this->belongsTo(Post::class);
    }

    public function comentario()
    {
        return $this->belongsTo(comentario::class);
    }

    public function usuario()
    {
        return $this->belongsTo(usuario::class);
    }
}
