<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMedecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomType'
    ];

    public function medecin()
    {
        return $this->hasMany(Medecin::class, 'typeMedecin_id');
    }
}
