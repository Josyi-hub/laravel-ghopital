<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RDV extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'patient_id',
        'medecin_id',
        'dateRDV',
        'heureRDV'
    ];

    public function patient()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function medecin()
    {
        return $this->belongsTo('App\Models\Medecin');
    }
}
