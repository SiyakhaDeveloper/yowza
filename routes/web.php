<?php

use App\Http\Controllers\Admin\DashboardController;
//use App\Http\Controllers\Admin\LibraryController;
//use App\Http\Controllers\Admin\ProfileController;
//use App\Http\Controllers\Admin\RoleController;

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\OrganisationWorkspaceController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', function () {
//    return redirect()->route('login');
//});

Route::get('/', function (){
   return view('welcome');
});

Illuminate\Support\Facades\Auth::routes(['verify' => true]);


Route::group(['middleware' => ['isAdmin'],'prefix' => 'portal', 'as' => 'portal.'], function(){

    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::resource('/organization-workspace', OrganisationWorkspaceController::class);
    Route::post('/organization-workspace/{workspace}/join', [OrganisationWorkspaceController::class, 'join'])->name('workspaces.join');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('faq', function () {
//    return view('helpdesk.faq');
//})->name('faq');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
