<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function internships()
    {
        return $this->belongsToMany(Internship::class, 'postules', 'user_id', 'internship_id')
                    ->withPivot('lettre_motivation', 'cv');
    }

    public function wishlistedInternships()
    {
        return $this->belongsToMany(Internship::class, 'wishlists');
    }
}
