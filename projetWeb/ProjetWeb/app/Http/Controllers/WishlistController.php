<?php

namespace App\Http\Controllers;
use App\Models\Wishlist;  
use App\Models\User; 
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    public function index()
    {
        $userId = Session::get('loginId');
        $wishlists = Wishlist::with('internship')->where('user_id', $userId)->get();

        // Passer les éléments de la wishlist à la vue
        return view('wishlist', compact('wishlists'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'internship_id' => 'required|integer',
        ]);
        
        $alreadyInWishlist = Wishlist::where('user_id', Session::get('loginId'))
            ->where('internship_id', $request->internship_id)
            ->exists();

        if ($alreadyInWishlist) {
            // S'il est déjà dans la liste de souhaits, renvoyez avec un message d'erreur
            return back()->with('error', 'This internship is already in your wishlist.');
        }

        Wishlist::create([
            'user_id' => Session::get('loginId'),
            'internship_id' => $request->internship_id,
        ]);

        // Renvoyez avec un message de succès
        return back()->with('success', 'Internship added to your wishlist!');
    }

    public function delete($id)
    {
        $wishlistItem = Wishlist::findOrFail($id);
        if($wishlistItem->user_id == Session::get('loginId')) {
            $wishlistItem->delete();
            return back();
        } else {
            return back();
        }
    }

    public function dashboard()
    {
        $user = User::where('id', Session::get('loginId'))->first();

        // Vérifiez si l'utilisateur est un étudiant
        if($user && $user->type === 'student') {
            return back();
        }

    }
}
