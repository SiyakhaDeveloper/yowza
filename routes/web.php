<?php
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\PostController;

use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\Admin\ProfileOrgImagesController;
use App\Http\Controllers\Admin\ApplicationsController;
use App\Http\Controllers\Admin\AlternativeContactPersonController;
use \App\Http\Controllers\Admin\OrganisationController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\CTAApplicationController;
//use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\ProfileController;
//use App\Http\Controllers\Admin\RoleController;

use App\Http\Controllers\OrganisationWorkspaceController;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::group(['middleware' => ['isAdmin'],'prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('/dashboard',[DashboardController::class,'index']);

    Route::get('/post/create',[PostController::class,'create'])->name('post.create');
    Route::get('/post',[PostController::class,'index'])->name('post.index');
    Route::post('/post',[PostController::class,'store'])->name('post.store');

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
