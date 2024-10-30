<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Internship;


class InternshipController extends Controller
{
    public function index(Request $request)
    {
        $query = Internship::query();
    
        // Vérifie si un terme de recherche a été envoyé
        if ($request->filled('search')) {
            $searchTerm = $request->search;
    
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('location', 'like', '%' . $searchTerm . '%')
                  ->orWhere('promotion_type', 'like', '%' . $searchTerm . '%')
                  ->orWhere('duration', 'like', '%' . $searchTerm . '%') 
                  ->orWhere('remuneration', '=', $searchTerm) 
                  ->orWhereHas('company', function($subQuery) use ($searchTerm) {
                      $subQuery->where('name', 'like', '%' . $searchTerm . '%');
                  })
                  ->orWhereHas('competences', function($subQuery) use ($searchTerm) {
                    $subQuery->where('name', 'like', '%' . $searchTerm . '%');
                });
                  
            });
        }
        
        $internships = $query->get();
        
        return view('internships', ['internships' => $internships]);
    }

    public function show($id)
    {
        $internship = Internship::with('competences')->findOrFail($id);
        return view('internshipInfo', compact('internship'));
    }

    
}
