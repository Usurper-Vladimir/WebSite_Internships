<?php

namespace App\Http\Middleware;
use App\Models\User; 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;


class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        //verifie que tu es login avant de pouvoir te connecter
        if (!session()->has('loginId')) {
            return redirect('login')->with('fail', 'You must be logged in to access this page.');
        }
        
        
        $user = User::find(session('loginId'));
        
        //pilote pas access a wishlist
        if ($user->type === 'pilote' && Str::startsWith($request->path(), 'wishlist')) {
            return back();
        }
        
        //pilote pas access a postuler
        if ($user && $user->type === 'pilote' && Str::startsWith($request->path(), 'postule')) {
            return back();
        }

         //pilote pas access au gestion pilote
         if($user->type === 'pilote'  && Str::startsWith($request->path(), 'admin/pilote')){
            return back();
        }

        //etudiant pas access au dashboard
        if ($user && $user->type === 'student' && Str::startsWith($request->path(), 'admin')) {
            return back();
        }
        
        return $next($request)
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
