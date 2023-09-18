<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    public function cargos() {
        return $this->hasMany(Cargo::class, 'Dep_id');
    }

}

