<?php

namespace App\Models;

use App\Models\Etude;
use Illuminate\Database\Eloquent\Model;

class Ratio extends Model
{
    protected $fillable = ['name','abreviation','description','typeparam','estCalcule','formule'];

    public function etudes()
    {
        return $this->hasMany(Etude::class);
    }
}
