<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $casts = [
        'offer_date' => 'date',
    ];
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'internship_competence', 'internship_id', 'competence_id');
    }
    

     public function users()
    {
        return $this->belongsToMany(User::class, 'postules', 'internship_id', 'user_id');
    }

    public function wishlistingUsers()
    {
        return $this->belongsToMany(User::class, 'wishlists');
    }
}
