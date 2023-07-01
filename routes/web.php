<?php

use User\UserController;
use Visitor\VisitorController;
use Social\AnnouncementController;
use Support\SupportScopeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Support\SupportTicketFilterController;

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
// Route::get('/log', 'User\UserController@index');



// Route::get('/dash', function () {
//     return view('Dashboard.dash');
// });

//------------------------------Auth-----------------------------//
// Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'loginUser'])->name('auth.login'); 
Route::post('/registerdata', [AuthController::class, 'saveUser'])->name('auth.store'); 
Route::get('/', [AuthController::class, 'index']);

Route::group(['middleware' => ['AuthCheck']], function(){
    Route::get('/dashbord', [AuthController::class, 'dashBoard'])->name('dashbord');
    Route::get('logout', [AuthController::class, 'logOut'])->name('auth.logout');
//------------------------------Space-----------------------------//
Route::resource('managelocations', Spaces\LocationManagerController::class);
Route::get('/managelocations/delete/{id}', 'Spaces\LocationManagerController@delete')->name('managelocations.destroy');
Route::resource('manageinventories', Spaces\ManageInventoryController::class); 
Route::get('/manageinventories/delete/{id}', 'Spaces\ManageInventoryController@destroy')->name('manageinventories.destroy');

Route::resource('manageplan', Spaces\ManagePlansController::class); 
Route::get('/manageplan/delete/{id}', 'Spaces\ManagePlansController@destroy')->name('manageplan.destroy');

//------------------------------ End Space -----------------------------//

//------------------------------ Start Community-----------------------------//
Route::resource('managemember', Community\ManageMemberController::class); 
 Route::get('/managemember/delete/{id}', 'Community\ManageMemberController@delete')->name('managemember.destroy');

Route::resource('managecompany', Community\ManageCompanyGeneralController::class);
Route::get('/managecompany/delete/{id}', 'Community\ManageCompanyGeneralController@destroy')->name('managecompany.destroy');

//------------------------------ End Community-----------------------------//

//------------------------------ Start Support-----------------------------//
Route::resource('manageteam', Support\ManageTeamController::class);
Route::get('/manageteam/delete/{id}', 'Support\ManageTeamController@destroy')->name('manageteam.destroy');

Route::get('supportscop', 'Support\SupportScopeController@index')->name('supportscop.index');
Route::post('/supportscop/data', 'Support\SupportScopeController@getAlldata')->name('supportscop.data');

Route::post('supportscop', 'Support\SupportScopeController@store')->name('supportscop.store');
Route::get('/editsupportscop/edit/{id?}', 'Support\SupportScopeController@edit')->name('editsupportscop.edit');
Route::delete('/deletesupportscop/delete/{id?}', 'Support\SupportScopeController@destroy')->name('deletesupportscop.delete');
Route::post('/updatesupportscop/update/{id?}', 'Support\SupportScopeController@update')->name('updatesupportscop.update');

Route::get('/manageteam/delete/{id}', 'Support\ManageTeamController@destroy')->name('manageteam.destroy');

Route::get('supportcategory', 'Support\SupportCategoryController@index')->name('supportcategory.index');
Route::post('/supportcategory/data', 'Support\SupportCategoryController@getAlldata')->name('supportcategory.data');
Route::post('supportcategory', 'Support\SupportCategoryController@store')->name('supportcategory.store');
Route::get('/editsupportcategory/edit/{id?}', 'Support\SupportCategoryController@edit')->name('editsupportcategory.edit');
Route::post('/updatesupportcategory/update/{id?}', 'Support\SupportCategoryController@update')->name('updatesupportcategory.update');
Route::delete('/deletesupportcategory/delete/{id?}', 'Support\SupportCategoryController@delete')->name('deletesupportcategory.delete');


Route::get('/supportsubcategory/show/{id?}', 'Support\SupportSubcategoryController@show')->name('supportsubcategory.show');
Route::post('supportcategory/store', 'Support\SupportSubcategoryController@store')->name('supportsubcategory.store');
Route::delete('/supportsubcategory/delete/{id?}', 'Support\SupportSubcategoryController@destroy')->name('supportsubcategory.delete');


//Support Ticket 
// Route::get('supportticket', Support\SupportTicketFilterController::class);
Route::get('supportticket', 'Support\SupportTicketFilterController@index')->name('supportticket.index');
Route::get('showticket/{id?}', 'Support\SupportTicketFilterController@show')->name('showticket');
Route::get('ticket_export','Support\SupportTicketExportController@exportSupportTicket')->name('exportticket');

//get Ticket
Route::get('assignticket/{id?}', 'Support\AssignTicketController@index')->name('assignticket');
Route::post('closeticket/{id?}', 'Support\AssignTicketController@closeTicket')->name('closeticket');
Route::post('assignticket/{id?}', 'Support\AssignTicketController@assignmentTicket')->name('assignticket.store');


//------------------------------ Start announcement-----------------------------//
// Route::resource('announcement', Social\AnnouncementController::class);

    Route::get('announcement', 'Social\AnnouncementController@index')->name('announcement.index');
    Route::get('announcement\create', 'Social\AnnouncementController@create')->name('announcement.create');
    Route::post('announcement\store', 'Social\AnnouncementController@store')->name('announcement.store');
    Route::get('announcement/{id}/edit', 'Social\AnnouncementController@edit')->name('announcement.edit');
    Route::put('announcement/{id}', 'Social\AnnouncementController@update')->name('announcement.update');
    Route::delete('announcement/{id}', 'Social\AnnouncementController@destroy')->name('announcement.delete');
//------------------------------ End announcement-----------------------------//

//------------------------------ Start announcement-----------------------------//

Route::resource('visitor', 'Visitor\VisitorController', ['only' => ['index', 'create','store', 'edit', 'update']]);
Route::get('/visitor/delete/{id}', 'Visitor\VisitorController@destroy')->name('visitor.destroy');
Route::get('/visitor/filter', 'Visitor\VisitorController@filter')->name('visitor.filter');


Route::get('/checkin', 'Visitor\CheckinController@checkInpage')->name('checkin');
Route::post('/checkinstore', 'Visitor\CheckinController@checkInStore')->name('checkin.store');
Route::get('/checkout', 'Visitor\CheckinController@checkOutpage')->name('checkout');
Route::get('/checkoutdata/{id?}', 'Visitor\CheckinController@checkOut')->name('checkoutdata');
Route::post('/checkoutupdate/{id?}', 'Visitor\CheckinController@updatecheckOut')->name('updatecheckout.update');
Route::get('/visitortimeline', 'Visitor\CheckinController@visitorTimeline')->name('visitortimeline');
Route::get('/visitortimeline', 'Visitor\CheckinController@visitorTimeline')->name('visitortimeline');

Route::get('/reason-for-visits', 'Visitor\CheckinController@reasonForvisits')->name('reasonvisits');
Route::get('visitor_export','Visitor\ExportVisitorController@exportVisitor')->name('exportvisitor');

Route::post('reasonvisitor','Visitor\CheckinController@visitorReasonStore')->name('reasonvisitor.store');
Route::get('/reasonvisitor/delete/{id}', 'Visitor\CheckinController@visitorDestroy')->name('visitoreasonr.destroy');


//------------------------------ Start Manageuser-----------------------------//

Route::resource('manageuser', Manageuser\ManageUserController::class); 
Route::get('/manageuser/delete/{id}', 'Manageuser\ManageUserController@destroy')->name('manageuser.destroy');

Route::resource('userdata', Manageuser\UserRoleController::class); 
Route::get('/userdata/delete/{id}', 'Manageuser\UserRoleController@destroy')->name('userdata.destroy');



// Route::get('/newuser', 'Visitor\VisitorController@newUser')->name('newuser');
// Route::get('/userrole', 'Visitor\VisitorController@userRole')->name('userrole');
Route::get('/edit', 'Visitor\VisitorController@editPermission')->name('editper');




});



