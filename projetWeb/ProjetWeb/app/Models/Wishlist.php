<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'internship_id'];
    public function internship()
    {
        return $this->belongsTo(Internship::class, 'internship_id');
    }
}
