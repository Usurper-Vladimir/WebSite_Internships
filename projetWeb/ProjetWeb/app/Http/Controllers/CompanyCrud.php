<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Location;

class CompanyCrud extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Company::query()->with('locations');

    // Vérifie si un terme de recherche a été envoyé
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
    
    return view('admin.company', compact('companies'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.CreateCompany');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     // Création de l'entreprise avec les données reçues.
    $company = new Company();
    $company->name = $request->input('name');
    $company->description = $request->input('description');
    $company->sector = $request->input('sector');

    // Gestion de l'image, si présente
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('public/image');
        $databasePath = str_replace('public/', '', $path);
        $company->image = $databasePath;
    }

    $company->save(); // Sauvegarde l'entreprise pour obtenir un ID

    // Traitement des localisations. Assurez-vous que le formulaire envoie les localisations sous forme de tableau.
    if($request->has('locations')) {
        foreach ($request->locations as $locationData) {
            $location = new Location();
            $location->country = $locationData['country'];
            $location->city = $locationData['city'];
            $location->address = $locationData['address'];
            $location->zip_code = $locationData['zip_code'];
            $location->company_id = $company->id;

            $location->save(); // Sauvegarde chaque localisation associée à l'entreprise
        }
    }

    // Redirection avec message de succès
    return redirect('admin/company');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::with('locations')->findOrFail($id);
        return view('CompanyInfo', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::with('locations')->findOrFail($id);
        return view('admin.UpdateCompany', compact('company'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $company = Company::findOrFail($id);
    $company->update($request->only(['name', 'description', 'sector']));

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('public/image');
        $databasePath = str_replace('public/', '', $path);
        $company->image = $databasePath;
        $company->save();
    }

    // Mise à jour des localisations associées
    if($request->has('locations')) {
        foreach ($request->locations as $locationData) {
            $locationId = $locationData['id'];
            $location = Location::find($locationId);

            // Si l'emplacement existe, le mettre à jour
            if ($location) {
                $location->update([
                    'country' => $locationData['country'],
                    'city' => $locationData['city'],
                    'address' => $locationData['address'],
                    'zip_code' => $locationData['zip_code'],
                ]);
            }
            // Sinon, vous pouvez décider de créer une nouvelle localisation ou de gérer cette situation selon votre logique métier
        }
    }

    return redirect('admin/company')->with('success', 'Company updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect('admin/company')->with('success', 'Company deleted successfully!');
    }
}
