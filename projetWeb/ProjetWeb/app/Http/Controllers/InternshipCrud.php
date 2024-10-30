<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\Company;
use App\Models\Competence;

class InternshipCrud extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
              ->orWhere('offer_date', 'like', '%' . $searchTerm . '%')
              ->orWhereHas('company', function($subQuery) use ($searchTerm) {
                  $subQuery->where('name', 'like', '%' . $searchTerm . '%');
              })
              ->orWhereHas('competences', function($subQuery) use ($searchTerm) {
                  $subQuery->where('name', 'like', '%' . $searchTerm . '%');
              });
        });
    }
    
    $internships = $query->get();
    
    return view('admin.internship', compact('internships'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCompetences = Competence::all(); 
        $companies = Company::all(); 
        
        return view("admin.CreateInternship", compact('allCompetences', 'companies'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Créer un nouvel internship
    $internship = new Internship();
    $internship->title = $request->input('title');
    $internship->description = $request->input('description');
    $internship->location = $request->input('location');
    $internship->promotion_type = $request->input('promotion_type');
    $internship->duration = $request->input('duration');
    $internship->remuneration = $request->input('remuneration');
    $internship->offer_date = $request->input('offer_date');
    $internship->available_positions = $request->input('available_positions');
    $internship->applicants_count = $request->input('applicants_count');
    $internship->company_id = $request->input('company_id');

    // Gérer l'upload de l'image
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('public/image');
        $databasePath = str_replace('public/', '', $path);
        $internship->image = $databasePath;
    }

    $internship->save();

    // Associer les compétences si fournies
    if ($request->has('competences')) {
        $internship->competences()->sync($request->input('competences'));
    }

    // Rediriger vers la liste des internships avec un message de succès
    return redirect('admin/internship')->with('success', 'Internship created successfully!');
    
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $internship = Internship::with(['company', 'competences'])->findOrFail($id);
        return view('InternshipInfo', compact('internship'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $internship = Internship::findOrFail($id); // Récupère le stage ou échoue avec une 404
        $allCompetences = Competence::all(); // Récupère toutes les compétences pour le sélecteur
        $companies = Company::all(); // Récupère toutes les entreprises pour le sélecteur
        $selectedCompetences = $internship->competences->pluck('id')->toArray(); // Récupère les IDs des compétences associées

        // Passe les données à la vue
         return view('admin.UpdateInternship', compact('internship', 'allCompetences', 'companies', 'selectedCompetences'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $internship = Internship::findOrFail($id);

    // Mise à jour des champs de l'internship directement sans validation
    $internship->title = $request->title;
    $internship->description = $request->description;
    $internship->location = $request->location;
    $internship->promotion_type = $request->promotion_type;
    $internship->duration = $request->duration;
    $internship->remuneration = $request->remuneration;
    $internship->offer_date = $request->offer_date;
    $internship->available_positions = $request->available_positions;
    $internship->applicants_count = $request->applicants_count;
    $internship->company_id = $request->company_id;

    if ($request->hasFile('image')) {
        // Store the file in the storage/app/public/image directory
        $path = $request->file('image')->store('public/image');
    
        // Remove 'public/' from the path for saving in the database
        $databasePath = str_replace('public/', '', $path);
    
        // Set the database path on the internship model
        $internship->image = $databasePath;
    }

    $internship->save();

    // Synchroniser les compétences
    if ($request->has('competences')) {
        $internship->competences()->sync($request->input('competences', []));
    }

    // Rediriger vers une route, par exemple l'index des internships avec un message de succès
    return redirect('admin/internship')->with('success', 'Internship updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $internship = Internship::findOrFail($id);

   
    $internship->delete();
    return redirect('admin/internship')->with('success', 'Internship updated successfully!');
    }
}
