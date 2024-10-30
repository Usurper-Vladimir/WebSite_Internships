<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['country', 'city', 'address', 'zip_code', 'company_id'];
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
