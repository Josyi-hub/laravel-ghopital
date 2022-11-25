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

    public function user()
    {
        return $this->belongsTo('App\Models\Medecin');
    }
}
