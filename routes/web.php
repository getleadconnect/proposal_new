<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\UserProfileController;

use App\Http\Controllers\User\ProposalController;

Route::get('/', function () {
    return view('auth.login');
});

Route::controller(LoginController::class)->group(function() {
	Route::get('/login', 'showLoginForm')->name('login');
	Route::post('/login', 'userLogin')->name('user-login');
	Route::post('/logout', 'logout')->name('logout');
	});


//Admin routes ----------------------------------------------------------------------
Route::group(['prefix'=>'admin','as'=>'admin.','middleware' => 'authware'], function()
{

	Route::controller(DashboardController::class)->group(function() {
		Route::get('/dashboard', 'index')->name('dashboard');
	});

	
	Route::controller(UserController::class)->group(function() {
		Route::get('/users-list', 'index')->name('users-list');
		Route::post('/save-user', 'store')->name('save-user');
		Route::get('/view-users', 'viewUsers')->name('view-users');
		Route::get('/delete-user/{id}', 'destroy')->name('delete-user');
		Route::get('/edit-user/{id}', 'edit')->name('edit-user');
		Route::post('/update-user', 'updateUser')->name('update-user');
		Route::get('/act-deact-user/{op}/{id}', 'activateDeactivate')->name('act-deact-user');
	});


});



Route::group(['prefix'=>'users','as'=>'users.','middleware' => 'authware'], function()
{

Route::controller(DashboardUserController::class)->group(function() {
	Route::get('/dashboard', 'index')->name('dashboard');
});

Route::controller(ProposalController::class)->group(function() {
	
	Route::get('/proposals', 'index')->name('proposals');
	Route::get('/view-proposals', 'getProposals')->name('view-proposals');
	Route::get('/view-proposal-template/{id}', 'viewProposalInTemplate')->name('view-proposal-template');
	Route::get('/generate-pdf/{id}', 'generateProposalPdf')->name('generate-pdf');
	
	Route::get('/delete-proposal/{id}', 'destroy')->name('delete-proposal');
	
	Route::get('/new-proposal', 'newProposal')->name('new-proposal');
	Route::post('/save-proposal-temp-item', 'saveProposalTempItem')->name('save-proposal-temp-item');
	Route::get('/get-proposal-temp-items', 'getProposalTempItems')->name('get-proposal-temp-items');
	Route::get('/delete-proposal-temp-item/{id}', 'deleteProposalTempItem')->name('delete-proposal-temp-item');
	Route::post('/save-proposal', 'saveProposal')->name('saveProposal');

});


Route::controller(UserProfileController::class)->group(function() {

	Route::get('/profile', 'index')->name('profile');
	Route::post('/update-user-profile', 'updateUserProfile')->name('update-user-profile');
	Route::post('/update-profile-image', 'uploadProfileImage')->name('update-profile-image');
	Route::post('/change-password', 'changePassword')->name('change-password');
});


});

