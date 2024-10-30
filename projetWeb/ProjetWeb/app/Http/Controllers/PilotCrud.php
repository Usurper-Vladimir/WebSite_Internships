<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class PilotCrud extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::where('type', 'pilote'); 

        // Vérifie si un terme de recherche a été envoyé
        if ($request->filled('search')) {
            $searchTerm = $request->search;
    
            $query->where(function($q) use ($searchTerm) {
                $q->where('nom', 'like', '%' . $searchTerm . '%')
                  ->orWhere('prenom', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%')
                  ->orWhere('centre', 'like', '%' . $searchTerm . '%')
                  ->orWhere('promotion', 'like', '%' . $searchTerm . '%');
            });
        }
        
        $pilotes = $query->get();
        
        return view('admin.pilote', ['users' => $pilotes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.CreatePilote");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    
        // Créer un nouvel utilisateur
        $user = new User();
        $user->nom = $request->input('Nom');       
        $user->prenom = $request->input('Prenom');
        $user->email = $request->input('Email');
        $user->password = $request->input('Password');
        $user->centre = $request->input('Center');
        $user->promotion = $request->input('Promotion');
        $user->type = 'pilote'; 
        $user->save();
    
        // Rediriger vers la liste des utilisateurs avec un message de succès
        return redirect('admin/pilote')->with('flash_message', 'Pilot created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.ViewPilote', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.UpdatePilote', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
    $user->nom = $request->Nom;       
    $user->prenom = $request->Prenom;
    $user->email = $request->Email;
    $user->password = $request->Password;
    $user->centre = $request->Center;
    $user->promotion = $request->Promotion;
    $user->save();

    return redirect('admin/pilote')->with('flash_message', 'Pilot updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('admin/pilote')->with('flash_message', 'Pilot deleted successfully!');
    }
}
