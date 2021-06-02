<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrgController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrgCrudController;
use App\Http\Controllers\AdminAuthController;
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

/*Route::get('/', function () {
    return view('index');
});
*/
//rute user
Route::get('/', [PagesController::class, 'portal']);
Route::get('/userHome', [PagesController::class, 'userHome']);
Route::get('/userEvents', [UserController::class, 'Event']);
Route::get('/userLogin', [UserController::class, 'Login']);
Route::get('/userRegister', [UserController::class, 'Register']);
Route::get('/evRegistration', [UserController::class, 'daftar']);
//rute organizer
Route::get('/orgHome', [PagesController::class, 'orgHome']);
Route::get('/orgLogin', [OrgController::class, 'Login']);
Route::get('/orgRegister', [OrgController::class, 'Register']);
Route::get('/addEvent', [OrgController::class, 'add']);
/*rute admin-user-crud
Route::get('/users', [AdminController::class, 'index']);
Route::get('/users/create', [AdminController::class, 'create']);
Route::get('/users/{user}', [AdminController::class, 'show']);
Route::post('/users', [AdminController::class, 'store']);
Route::delete('/users/{user}', [AdminController::class, 'destroy']);
Route::get('/users/{user}/edit', [AdminController::class, 'edit']);
Route::put('/users/{user}', [AdminController::class, 'update']);
*/
Route::get('/adminLogin',[AdminAuthController::class,'login'])->name('adminLogin');
Route::post('/adminLogin',[AdminAuthController::class,'pastlogin']);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/adminHome', [PagesController::class, 'admHome'])->name('adminHome');
    // Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::resource('users', AdminController::class);
    Route::resource('organizers', OrgCrudController::class);  
});
//Route::resource('users', AdminController::class);
//rute admin-crud-organizer
/*Route::get('/organizers', [OrgCrudController::class, 'index']);
Route::get('/organizers/create', [OrgCrudController::class, 'create']);
Route::get('/organizers/{organizer}', [OrgCrudController::class, 'show']);
Route::post('/organizers', [OrgCrudController::class, 'store']);
Route::get('/organizers/{organizer}/edit', [OrgCrudController::class, 'edit']);
Route::put('/organizers/{organizer}', [OrgCrudController::class, 'update']);
Route::delete('/organizers/{organizer}', [OrgCrudController::class, 'destroy']);*/