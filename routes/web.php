<?php

use App\Http\Controllers\Admin\ComplianceAuditController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CTAControlller;
use App\Http\Controllers\Admin\FounderDetailController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SocialEnterpriseProjectController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\VolunteerApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\Admin\ProfileOrgImagesController;
use App\Http\Controllers\Admin\ApplicationsController;
use App\Http\Controllers\Admin\AlternativeContactPersonController;
use \App\Http\Controllers\Admin\OrganisationController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\CTAApplicationController;

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


Route::group(['middleware' => ['isAdmin', 'verified'],'prefix' => 'admin', 'as' => 'admin.'], function(){



});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('faq', function () {
//    return view('helpdesk.faq');
//})->name('faq');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
