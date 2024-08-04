<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class usuario extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "usuario";

    public function post()
    {
        return $this->hasMany(usuario::class);
    }
    public function comentario()
    {
        return $this->hasMany(usuario::class);
    }

    public function megusta()
    {
        return $this->hasMany(usuario::class);
    }
}
