<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;
    
    public function internships()
{
    return $this->belongsToMany(Internship::class, 'internship_competence', 'competence_id', 'internship_id');
}
}
