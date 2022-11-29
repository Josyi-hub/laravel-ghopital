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

    public function type_medecin()
    {
        return $this->belongsTo('App\Models\TypeMedecin', 'typeMedecin_id');
    }

    public function rdv()
    {
        return $this->hasMany('App\Models\RDV', 'medecin_id');
    }
}
