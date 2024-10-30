<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Location;
use App\Models\Internship;


class LoginController extends Controller
{
    //Login view
    public function login(){
        return view('login');
    } 


    //login info + obligation
    public function loginUser(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);

        $user = User::where('email','=', $request->email)->first();
        if($user){
            if($user && $user->password === $request->password){
                $request->session()->put('loginId', $user->id);
                $request->session()->put('userType', $user->type);

                return redirect('home');
            }else{
            return back()->with('fail','Password does not matches.');
            }

        }else{
            return back()->with('fail','This email is not registred.');
        }
        
    }
    
    //Home View
    public function home()
    {
        return view('home');
    }
   

    //account View
    public function account()
    {
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }
        return view('account',compact('data'));
    }


    //dashboard View
    public function dash()
    {
        $data = array();
        if (Session::has('loginId')) {
      
        $data = User::where('id','=',Session::get('loginId'))->first();
    }

    return view('layout.dash', compact('data'));
    }
    
    


    //Logout 
    public function logout()
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }


    //dashboard stats
    
    public function stat()
    {
        $secteurData= Company::select('sector', DB::raw('count(*) as total'))
                        ->groupBy('sector')
                        ->get();
                        // dd($secteurData);
        $localiteCtx=Location::select('city', DB::raw('count(*) as total'))
        ->groupBy('city')
        ->get();
        
    $bestCtx = Company::select('companies.id as companies_id', 'companies.name', DB::raw('COUNT(postules.id) as num_students_applied'))
    ->join('internships', 'companies.id', '=', 'internships.company_id')
    ->join('postules', 'internships.id', '=', 'postules.internship_id')
    ->groupBy('companies.id', 'companies.name')
    ->get();
    $skillCtx=DB::table('competences')
    ->select('competences.name AS competence_name', DB::raw('COUNT(internship_competence.internship_id) AS num_internships'))
    ->join('internship_competence', 'competences.id', '=', 'internship_competence.competence_id')
    ->groupBy('competences.name')
    ->get();

    $skillLCtx =Internship::select('location', DB::raw('count(*) as total'))
    ->groupBy('location')
    ->get();
    $skillPCtx =Internship::select('promotion_type', DB::raw('count(*) as total'))
    ->groupBy('promotion_type')
    ->get();
    $skillDCtx =Internship::select('duration', DB::raw('count(*) as total'))
    ->groupBy('duration')
    ->get();
    $skillWCtx = Internship::select('internships.id as internship_id', 'internships.title as internship_name', DB::raw('COUNT(wishlists.id) as num_wishlists'))
    ->leftJoin('wishlists', 'internships.id', '=', 'wishlists.internship_id')
    ->groupBy('internships.id', 'internships.title')
    ->get();
    $studentNCtx= User::select('nom', DB::raw('COUNT(*) as user_count'))
    ->where('type', 'student')
    ->groupBy('nom')
    ->get();
    $studentPCtx= User::select('prenom', DB::raw('COUNT(*) as user_count'))
    ->where('type', 'student')
    ->groupBy('prenom')
    ->get();
    $studentCCtx= User::select('centre', DB::raw('COUNT(*) as user_count'))
    ->where('type', 'student')
    ->groupBy('centre')
    ->get();
    $studentPrCtx= User::select('promotion', DB::raw('COUNT(*) as user_count'))
    ->where('type', 'student')
    ->groupBy('promotion')
    ->get();




    
    
        return view('admin.stat', compact('secteurData','localiteCtx','bestCtx','skillCtx','skillLCtx','skillPCtx','skillDCtx','skillWCtx','studentNCtx','studentPCtx','studentCCtx','studentPrCtx'));
    }


   
}




