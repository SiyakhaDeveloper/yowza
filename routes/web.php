<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Corporate\CorporateDashboardController;
use App\Http\Controllers\Development\DevelopmentDashboardController;
use App\Http\Controllers\Individual\IndividualDashboardController;
use App\Http\Controllers\SMME\SmmeDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\VolunteerController;
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

Route::middleware(['auth'])->group(function () {
    // Routes for Administrator
    Route::group(['middleware' => ['isAdmin'], 'prefix' => 'admin/{prefix}', 'as' => 'admin.'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
        Route::get('/post', [PostController::class, 'index'])->name('post.index');
        Route::post('/post', [PostController::class, 'store'])->name('post.store');
        Route::get('/post/{id}',[PostController::class,'show'])->name('post.show');

        Route::resource('/organization-workspace', OrganisationWorkspaceController::class);
        Route::post('/organization-workspace/{workspace}/join', [OrganisationWorkspaceController::class, 'join'])->name('workspaces.join');
    });

    // Routes for Individual
    Route::group(['middleware' => ['isIndividual'], 'prefix' => 'individual/{prefix}', 'as' => 'individual.'], function () {
        Route::get('/dashboard', [IndividualDashboardController::class, 'index'])->name('dashboard');
        // Add more routes specific to Individual users as needed
    });

    // Routes for Corporate Sponsors
    Route::group(['middleware' => ['isCorporate'], 'prefix' => 'corporate/{prefix}', 'as' => 'corporate.'], function () {
        Route::get('/dashboard', [CorporateDashboardController::class, 'index'])->name('dashboard');
        // Add more routes specific to Corporate users as needed
    });

    // Routes for Development Partners
    Route::group(['middleware' => ['isDevelopment'], 'prefix' => 'development/{prefix}', 'as' => 'development.'], function () {
        Route::get('/dashboard', [DevelopmentDashboardController::class, 'index'])->name('dashboard');
        // Add more routes specific to Development users as needed
    });

    // Routes for SMME
    Route::group(['middleware' => ['isSmme'], 'prefix' => 'smme/{prefix}', 'as' => 'smme.'], function () {
        Route::get('/dashboard', [SmmeDashboardController::class, 'index'])->name('dashboard');
        Route::resource('/organization-workspace', OrganisationWorkspaceController::class);
        Route::post('/organization-workspace/{workspace}/join', [OrganisationWorkspaceController::class, 'join'])->name('workspaces.join');
    });
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
Route::get('/create-workspace', 'OrganisationWorkspaceController@create')->name('createWorkspace');
Route::post('/create-workspace', 'OrganisationWorkspaceController@store')->name('storeWorkspace');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/workspace-test', function(){
    return view('workspace.register_workspace');
});

