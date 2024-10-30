<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'sector', 'image'];
    
    // Définition de la relation avec la table 'locations'
    public function locations() // Utilisez le pluriel ici pour refléter la collection d'emplacements
    {
        return $this->hasMany(Location::class);
    }

    // Définition de la relation avec la table 'internships'
    public function internship()
    {
        return $this->hasMany(Internship::class);
    }

    
}
