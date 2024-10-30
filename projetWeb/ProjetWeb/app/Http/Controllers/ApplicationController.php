<?php

namespace App\Http\Controllers;
use App\Models\Postule;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    
    public function store(Request $request)
{
    $request->validate([
        'cv' => 'required|file|mimes:pdf,doc,docx|max:5000',
        'lettre_motivation' => 'required|string',
    ]);
    

    $alreadyApplied = Postule::where('user_id', Session::get('loginId'))
    ->where('internship_id', $request->internship_id)
    ->exists();

    if ($alreadyApplied) {
        return back()->with('error', 'You have already applied to this internship.');
         }

    $cvPath = $request->file('cv')->store('cvs', 'public');

    Postule::create([
        'user_id' => Session::get('loginId'),
        'internship_id' => $request->internship_id,
        'cv' => $cvPath,
        'lettre_motivation' => $request->lettre_motivation,
    ]);
    return back()->with('success', 'Your application has been submitted successfully!');
}

public function showForm()
{
    return view('postule');
}
}
