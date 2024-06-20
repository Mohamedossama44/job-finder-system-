<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\FormController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# register
Route::post('/register', [UserController::class, 'register_action'])->name('register.action');

# login
Route::post('/login', [UserController::class, 'login_action'])->name('login.action');

# logout
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware'=>['AuthCheck']], function(){
    # homepage
    Route::get('/', [UserController::class, 'home'])->name('homePage');
    # login & register view
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::get('/admin/index', [adminController::class, 'index'])->name('adminRoute');

    # company
    Route::get('/dashboard', [CompanyController::class, 'companyHomePage'])->name('companyDashboard');
    Route::get('/postJob', [CompanyController::class, 'postJob'])->name('postJob');
    Route::post('/postJob', [CompanyController::class, 'postJob_action'])->name('postJob.action');
    Route::delete('/postJob/{id}', [CompanyController::class, 'deleteJobPost'])->name('deleteJob');
    Route::get('/jobApplicants/{id}', [CompanyController::class, 'applicantsJob'])->name('applicants');
    # jobSeeker
    Route::get('/jobsfeed', [JobSeekerController::class, 'jobsfeed'])->name('jobseekerDashboard');
    Route::get('/jobsform/{ID}', [FormController::class, 'applyform'])->name('form');
    Route::post('/jobsform/{ID}', [FormController::class, 'applyaction'])->name('apply.action');
    # admin
    //add new company route
    Route::get('/admin/addNewCompany', [adminController::class, 'add'])->name('addCompanyForm');
    //Store form data in DB route
    Route::post('/admin/addNewCompany', [adminController::class, 'store'])->name('addCompany.action');
    //Delete Company From DB route
    Route::get('delete/{name?}', [adminController::class, 'destroy'])->name('removeCompany.action');
});
