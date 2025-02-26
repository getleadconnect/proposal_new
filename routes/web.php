<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\UserProfileController;

use App\Http\Controllers\User\ProposalController;
use App\Http\Controllers\User\StaffUsersController;
use App\Http\Controllers\User\DesignationController;
use App\Http\Controllers\User\ProposalHeadingsController;

use App\Http\Controllers\User\NewProposalController;

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
	
	/*Route::get('/new-proposal', 'newProposal')->name('new-proposal');
	Route::post('/save-proposal-temp-item', 'saveProposalTempItem')->name('save-proposal-temp-item');
	Route::get('/get-proposal-temp-items', 'getProposalTempItems')->name('get-proposal-temp-items');
	Route::get('/delete-proposal-temp-item/{id}', 'deleteProposalTempItem')->name('delete-proposal-temp-item');
	Route::post('/save-proposal', 'saveProposal')->name('saveProposal');*/

});


Route::controller(UserProfileController::class)->group(function() {

	Route::get('/profile', 'index')->name('profile');
	Route::post('/update-user-profile', 'updateUserProfile')->name('update-user-profile');
	Route::post('/update-profile-image', 'uploadProfileImage')->name('update-profile-image');
	Route::post('/change-password', 'changePassword')->name('change-password');
});


Route::controller(StaffUsersController::class)->group(function() {

	Route::get('/list-users', 'index')->name('list-users');
	Route::get('/add-user', 'addNewUser')->name('add-user');
	Route::post('/save-staff-user', 'store')->name('save-staff-user');
	Route::get('/view-staff-users', 'viewStaffUsers')->name('view-staff-users');
	Route::get('/edit-staff-user/{id}', 'edit')->name('edit-staff-user');
	Route::post('/update-staff-user', 'updateStaffUser')->name('update-staff-user');
	Route::get('/delete-staff-user/{id}', 'destroy')->name('delete-staff-user');
	Route::get('/act-deact-staff-user/{op}/{id}', 'activateDeactivate')->name('act-deact-staff-user');	
	
});

Route::controller(DesignationController::class)->group(function() {

	Route::get('/designations', 'index')->name('designations');
	Route::post('/save-designation', 'store')->name('save-designation');
	Route::get('/view-designations', 'viewDesignations')->name('view-designations');
	Route::get('/edit-designation/{id}', 'edit')->name('edit-designation');
	Route::post('/update-designation', 'updateDesignation')->name('update-designation');
	Route::get('/delete-designation/{id}', 'destroy')->name('delete-designation');
	
});


Route::controller(ProposalHeadingsController::class)->group(function() {

	Route::get('/proposal/banners', 'banners')->name('proposal-banners');
	Route::get('/view-banners', 'viewBanners')->name('view-banners');
	Route::post('/save-banner', 'saveBanner')->name('save-banner');
	Route::post('/update-banner', 'updateBanner')->name('update-banner');
	Route::get('/delete-banner/{id}', 'deleteBanner')->name('delete-banner');

	Route::get('/proposal/value-headings', 'valueHeadings')->name('proposal-value-headings');
	Route::get('/view-proposal-value-headings', 'viewProposalValueHeadings')->name('view-proposal-value-headings');
	Route::post('/save-value-heading', 'saveValueHeading')->name('save-value-heading');
	Route::post('/update-value-heading', 'updateValueHeading')->name('update-value-heading');
	Route::get('/delete-value-heading/{id}', 'deleteValueHeading')->name('delete-value-heading');

	Route::get('/proposal/headings', 'index')->name('proposal-headings');
	Route::get('/view-proposal-headings', 'viewProposalHeadings')->name('view-proposal-headings');
	Route::post('/save-heading', 'store')->name('save-heading');
	Route::post('/update-heading', 'updateHeading')->name('update-heading');
	Route::get('/delete-heading/{id}', 'destroy')->name('delete-heading');
	
	Route::get('/proposal/heading-items', 'headingItems')->name('proposal-heading-items');
	Route::get('/view-heading-items', 'viewHeadingItems')->name('view-heading-items');
	Route::post('/save-heading-item', 'saveHeadingItem')->name('save-heading-item');
	Route::post('/update-heading-item', 'updateHeadingItem')->name('update-heading-item');
	Route::get('/delete-heading-item/{id}', 'deleteHeadingItem')->name('delete-heading-item');
	
	Route::get('/proposal/special-services', 'specialServices')->name('proposal-special-services');
	Route::get('/view-special-services', 'viewSpecialServices')->name('view-special-services');
	Route::post('/save-special-service', 'saveSpecialService')->name('save-special-service');
	Route::post('/update-special-service', 'updateSpecialService')->name('update-special-service');
	Route::get('/delete-special-service/{id}', 'deleteSpecialService')->name('delete-special-service');
	
	Route::get('/proposal/other-services', 'otherServices')->name('proposal-other-services');
	Route::get('/view-other-services', 'viewOtherServices')->name('view-other-services');
	Route::post('/save-other-service', 'saveOtherService')->name('save-other-service');
	Route::post('/update-other-service', 'updateOtherService')->name('update-other-service');
	Route::get('/delete-other-service/{id}', 'deleteOtherService')->name('delete-other-service');

	Route::get('/proposal/bank-details', 'bankDetails')->name('proposal-bank-details');
	Route::get('/view-bank-details', 'viewBankDetails')->name('view-bank-details');
	Route::post('/save-bank-details', 'saveBankDetails')->name('save-bank-details');
	Route::get('/edit-bank-detail/{id}', 'edit')->name('edit-bank-detail');
	Route::post('/update-bank-details', 'updateBankDetails')->name('update-bank-details');
	Route::get('/delete-bank-details/{id}', 'deleteBankDetails')->name('delete-bank-details');
		
	Route::get('/proposal/documents', 'documents')->name('proposal-documents');
	Route::get('/view-documents', 'viewDocuments')->name('view-documents');
	Route::post('/save-document', 'saveDocument')->name('save-document');
	Route::post('/update-document', 'updateDocument')->name('update-document');
	Route::get('/delete-document/{id}', 'deleteDocument')->name('delete-document');
	
	Route::get('/proposal/timelines', 'timelines')->name('proposal-process-timelines');
	Route::get('/view-process-timelines', 'viewProcessTimelines')->name('view-process-timelines');
	Route::post('/save-process-timeline', 'saveProcessTimeline')->name('save-process-timeline');
	Route::post('/update-process-timeline', 'updateProcessTimeline')->name('update-process-timeline');
	Route::get('/delete-process-timeline/{id}', 'deleteProcessTimeline')->name('delete-process-timeline');
	
	Route::get('/proposal/notes', 'notes')->name('proposal-notes');
	Route::get('/view-notes', 'viewNotes')->name('view-notes');
	Route::post('/save-note', 'saveNote')->name('save-note');
	Route::post('/update-note', 'updateNote')->name('update-note');
	Route::get('/delete-note/{id}', 'deleteNote')->name('delete-note');
	
	Route::get('/proposal/conditions', 'conditions')->name('proposal-conditions');
	Route::get('/view-conditions', 'viewConditions')->name('view-conditions');
	Route::post('/save-condition', 'saveCondition')->name('save-condition');
	Route::post('/update-condition', 'updateCondition')->name('update-condition');
	Route::get('/delete-condition/{id}', 'deleteCondition')->name('delete-condition');

});


Route::controller(NewProposalController::class)->group(function() {

	Route::get('/proposal/create', 'index')->name('new-proposal');
	Route::get('/view-proposal-values', 'viewProposalTempValues')->name('view-proposal-values');
	Route::post('/save-proposal-value', 'store')->name('save-proposal-value');
	Route::get('/delete-proposal-value/{id}', 'destroy')->name('delete-proposal-value');
	Route::post('/save-new-proposal', 'saveNewProposal')->name('save-new-proposal');
	Route::get('/get-customer/{id}', 'getCustomer')->name('get-customer');

});


});

