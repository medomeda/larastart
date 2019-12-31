<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ratio extends Model
{
    protected $fillable = ['name','abreviation','description','typeparam','estCalcule','formule'];
}
