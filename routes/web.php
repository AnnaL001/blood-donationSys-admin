<?php
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/layout/layout', function () {
    return view('layout.layout');
});

Route::get('/users/home', function () {
    return view('users.home');
})->middleware('auth');

Route::get('/admin/donor_response', function () {
    return view('admin.donor_response');
})->middleware('auth');

Route::get('/admin/blood_donation', function () {
    return view('admin.blood_donation');
});

Route::get('/users/profile', function () {
    return view('users.profile');
})->middleware(['auth','auth.super_admin']);

Route::get('/super_admin/admin', function () {
    return view('super_admin.admin'); }) ->middleware(['auth','auth.super_admin']);

Route::namespace('Super_admin')->middleware(['auth','auth.super_admin'])->prefix('super_admin')->
name('super_admin.')->group(function (){
    Route::resource('admins', 'AdminController');
});

Route::namespace('Admin')->middleware(['auth'])->prefix('admin')->
name('admin.')->group(function (){
    Route::resource('requests', 'BloodRequestController', ['except'=> ['show']]);
});

Route::namespace('Admin')->middleware(['auth'])->prefix('admin')->
name('admin.')->group(function (){
    Route::resource('donors', 'DonorController');
});

Route::namespace('Super_admin')->middleware(['auth','auth.super_admin'])->prefix('super_admin')->
name('super_admin.')->group(function (){
    Route::resource('branches', 'BranchController', ['except'=> ['show']]);
});

Route::namespace('User')->middleware(['auth'])->prefix('user')->
name('user.')->group(function (){
    Route::resource('profiles','ProfileController',['except'=>['show','create','store','edit','update','destroy']]);
});

Route::namespace('Admin')->middleware(['auth'])->prefix('admin')->
name('admin.')->group(function (){
    Route::resource('donations','DonationController',['except'=>['show','create','store','destroy']]);
});
