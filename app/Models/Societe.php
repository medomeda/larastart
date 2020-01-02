<?php

namespace App\Models;

use App\Models\Etude;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    protected $fillable = ['name','sigle','description'];


    public function etudes()
    {
        return $this->hasMany(Etude::class);
    }
}

