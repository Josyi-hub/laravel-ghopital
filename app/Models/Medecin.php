<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'typeMedecin_id',
        'nomMedecin'
    ];

    public function rdv()
    {
        return $this->hasMany('App\Models\RDV');
    }

    public function specialite()
    {
        return $this->hasMany('App\Models\TypeMedecin');
    }
}
