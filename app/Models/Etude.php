<?php

namespace App\Models;

use App\Models\Ratio;
use App\Models\Societe;
use Illuminate\Database\Eloquent\Model;

class Etude extends Model
{
    protected $fillable = ['societe_id','ratio_id','periode','valeur'];

    public function societe()
    {
        return $this->belongsTo(Societe::class);
    }

    public function ratio()
    {
        return $this->belongsTo(Ratio::class);
    }
}
