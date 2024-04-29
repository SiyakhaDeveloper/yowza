<?php
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;

=======
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\Admin\ProfileOrgImagesController;
use App\Http\Controllers\Admin\ApplicationsController;
use App\Http\Controllers\Admin\AlternativeContactPersonController;
use \App\Http\Controllers\Admin\OrganisationController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\CTAApplicationController;
use App\Http\Controllers\OrganisationWorkspaceController;
>>>>>>> 983069dd5e4fe35721f73dc0f995d3eec8c57853

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


Route::get('/', function (){
   return view('welcome');
});

Route::group(['middleware' => ['isAdmin'],'prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('/dashboard',[DashboardController::class,'index']);
<<<<<<< HEAD
    Route::get('/post/create',[PostController::class,'create'])->name('post.create');
    Route::get('/post',[PostController::class,'index'])->name('post.index');
    Route::post('/post',[PostController::class,'store'])->name('post.store');
=======
    Route::resource('/organization-workspace', OrganisationWorkspaceController::class);
    Route::post('/organization-workspace/{workspace}/join', [OrganisationWorkspaceController::class, 'join'])->name('workspaces.join');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('faq', function () {
//    return view('helpdesk.faq');
//})->name('faq');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
>>>>>>> 983069dd5e4fe35721f73dc0f995d3eec8c57853
});


Auth::routes();
