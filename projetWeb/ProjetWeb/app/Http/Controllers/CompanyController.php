<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $query = Company::query();

        // Supposons que le terme de recherche est envoyé en tant que paramètre 'search'
        if ($request->filled('search')) {
            $searchTerm = $request->search;
    
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('sector', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('locations', function($subQuery) use ($searchTerm) {
                      $subQuery->where('country', 'like', '%' . $searchTerm . '%')
                               ->orWhere('city', 'like', '%' . $searchTerm . '%')
                               ->orWhere('address', 'like', '%' . $searchTerm . '%')
                               ->orWhere('zip_code', 'like', '%' . $searchTerm . '%');
                  });
            });
        }
        
        $companies = $query->get();
        
        return view('companies', ['companies' => $companies]);
    }

    public function show($id)
{
    $company = Company::with('locations')->findOrFail($id); 
    return view('CompanyInfo', compact('company'));
}
}
