<?php


use App\Http\Controllers\LoginController;

use App\Http\Controllers\InternshipController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\WishlistController;

use App\Http\Controllers\PilotCrud;
use App\Http\Controllers\StudentCrud;
use App\Http\Controllers\InternshipCrud;
use App\Http\Controllers\CompanyCrud;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//login
Route::get('/', [LoginController::class, 'login']);//login par default
Route::get('/login', [LoginController::class, 'login'])->middleware('AlreadyLoggedIn');//login page
Route::post('login-user',[LoginController::class,'loginUser'])->name('login-user'); //login info + obligation

//home
Route::get('/home',[LoginController::class,'home'])->middleware('isLoggedIn');//home page
Route::get('/account', [LoginController::class, 'account'])->middleware('isLoggedIn');//account page
Route::get('/logout', [LoginController::class, 'logout'])->middleware('isLoggedIn');//logout
Route::get('/admin/dashboard', [LoginController::class, 'dash'])->name('dashboard')->middleware('isLoggedIn');//dashboard page



//internships
Route::get('/internships', [InternshipController::class, 'index'])->name('internships.index')->middleware('isLoggedIn');//voir toutes les internships
Route::get('/internships/{id}', [InternshipController::class, 'show'])->name('internships.show')->middleware('isLoggedIn');//voir les infos d'une internship spécifique


//companies
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index')->middleware('isLoggedIn');//voir toutes les companies
Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show')->middleware('isLoggedIn');//voir les infos d'une company spécifique
 

//crud admin
Route::get('/admin/stat', [LoginController::class, 'stat'])->middleware('isLoggedIn');
Route::resource('admin/pilote', PilotCrud::class)->middleware('isLoggedIn');//crud pilote
Route::resource('admin/student', StudentCrud::class)->middleware('isLoggedIn');//crud student
Route::resource('admin/internship', InternshipCrud::class)->middleware('isLoggedIn');//crud internship
Route::resource('admin/company', CompanyCrud::class)->middleware('isLoggedIn');//crud company

//postuler
Route::get('/postule', [ApplicationController::class, 'showForm'])->name('postule.form')->middleware('isLoggedIn');//voir formulaire postule
Route::post('/postule', [ApplicationController::class, 'store'])->name('postule.store')->middleware('isLoggedIn');//ajouter une postulation

//wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist')->middleware('isLoggedIn');//voir wishlist
Route::post('/wishlist', [WishlistController::class, 'add'])->name('wishlist.add')->middleware('isLoggedIn');//ajouter wishlist
Route::delete('/wishlist/{id}', [WishlistController::class, 'delete'])->name('wishlist.remove')->middleware('isLoggedIn');//supp wishlist
Route::get('', [WishlistController::class, 'dashboard'])->middleware('isLoggedIn');//bloquer le dashboard pour letudiant

