<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Support\TicketController;
use App\Http\Controllers\Social\Stream\StreamController;
use App\Http\Controllers\Social\Stream\CommentController;
use App\Http\Controllers\Support\SupportTicketController;
use App\Http\Controllers\Spaces\LocationGeneralController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/locate/{id}', [LocationGeneralController::class, 'index']);
// Route::post('/locate', [LocationGeneralController::class, 'store']);
// Route::put('/locate/{id}', [LocationGeneralController::class, 'update']);
//Route::post('/logins', 'Api\Auth\LoginController@login');
//support staff, user role,  support 
// Route::get('users.tickets', 'Support\SupportTicketController@index');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//------------------------------Auth & Login-----------------------------//

Route::get('companieslists', 'Community\ManageCompanyGeneralController@companies');
Route::get('locationlists', 'Spaces\LocationGeneralController@locations');




Route::post('/teamlogin', 'TeamAuthController@login'); 
Route::get('refresh', 'Api\Auth\LoginController@refresh');

Route::post('/login', 'AuthController@login');

Route::middleware(['auth:sanctum'])->group(function () { 
    Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
    Route::resource('stream', 'Social\Stream\StreamController', ['only' => ['index', 'store', 'update', 'destroy']]);
    Route::resource('announcement', 'Social\AnnouncementController', ['except' => ['create', 'edit']]);
    
    
    
    Route::resource('locate', 'Spaces\LocationGeneralController', ['except' => ['create', 'edit']]);
 
    
//------------------------------Mobile Stream-----------------------------//

Route::post('comment', [CommentController::Class, 'store']);
Route::resource('user.stream', 'Social\Stream\UserPoststreamController', ['only' => ['index', 'update', 'destroy']]);
Route::resource('user.stream.comment', 'Social\Stream\CommentController', ['except' => ['create', 'edit']]);
Route::get('stream/{Id}/comment', 'Social\Stream\CommentController@getComment');
//------------------------------Support & Ticket-----------------------------//

Route::resource('supportcategory', 'Support\SupportCategoryController', ['except' => ['create', 'edit']]);
Route::resource('supportcategory.supportsubcategory.tickets', 'Support\SupportTicketController', ['except' => ['create', 'edit']]);
Route::resource('supportcategory.supportsubcategory', 'Support\SupportSubcategoryController', ['except' => ['create', 'edit']]);

Route::resource('userrole', 'Support\RoleController', ['except' => ['create', 'edit']]);
Route::resource('supportstaff', 'Support\ResourseController', ['except' => ['create', 'edit']]);
Route::post('tickets', [SupportTicketController::class, 'index']);
Route::get('supporttickets', [TicketController::class, 'index']);
Route::resource('ticketcomments', 'Support\UserTicketCommentController', ['except' => ['create', 'edit']]);

    
//------------------------------Space-----------------------------//

Route::get('locations', 'Spaces\LocationManagerController@index');
Route::resource('manageinventories', 'Spaces\ManageInventoryController', ['except' => ['create', 'edit']]);    
// Route::resource('locate', 'Spaces\LocationGeneralController', ['except' => ['create', 'edit']]);
Route::resource('locate.billings', 'Spaces\LocationBillingController', ['except' => ['create', 'edit']]);
Route::resource('locate.banks', 'Spaces\LocationBankController', ['except' => ['create', 'edit']]);
Route::resource('manageplans', 'Spaces\ManagePlansController', ['except' => ['create', 'edit']]);
//------------------------------Community-----------------------------//

Route::resource('companiesgenerals', 'Community\ManageCompanyGeneralController', ['except' => ['create', 'edit']]);
Route::resource('companiesgenerals.companiesgeneralsbilling', 'Community\ManageCompanyBillingController', ['except' => ['create', 'edit']]);
Route::resource('companiesgenerals.companiesspoc', 'Community\CompanySpocController', ['except' => ['create', 'edit']]);
Route::resource('companiesgeneral.companieskyc', 'Community\CompanyKycController', ['except' => ['create', 'edit']]);
Route::resource('addmembers', 'Community\ManageMemberController', ['except' => ['create', 'edit']]);

 Route::resource('membersearch/{hashtag}', 'Search\MemberSearchController', ['only' => ['index']]);
 
 Route::resource('feed/{hashtag}', 'Search\HashtagSearchController', ['only' => ['index']]);
 Route::resource('feedsfilter', 'Search\FeedFilterController', ['except' => ['create', 'edit']]);

// Route::resource('announcement', 'Social\AnnouncementController', ['except' => ['create', 'edit']]);
Route::resource('alliance', 'Social\AllianceController', ['except' => ['create', 'edit']]);
Route::resource('events', 'Social\EventsController', ['except' => ['create', 'edit']]);

Route::resource('country', 'Social\CountryController', ['only' => ['index']]);
Route::resource('alliancecategory', 'Social\AllignsCategoryController', ['only' => ['index']]);

// Route::resource('teammember', 'Support\ManageTeamController', ['except' => ['create', 'edit']]);

Route::resource('addscope', 'Support\SupportScopeController', ['except' => ['create', 'edit']]);
Route::resource('supportteammember', 'Support\ManageTeamController', ['except' => ['create', 'edit']]);



Route::resource('whoposted', 'Search\MostPostedUserController', ['only' => ['index']]);
Route::get('feed/{Id}/comment', 'Social\Stream\CommentController@getComment');

Route::get('spam', 'Search\MostPostedUserController@spam');
Route::get('highlikes', 'Search\MostPostedUserController@mostLikedPost');
Route::get('highcomments', 'Search\MostPostedUserController@mostCommentedPost');
Route::get('hiddenonly', 'Search\MostPostedUserController@hiddenPost');

Route::resource('assignticket', 'Support\AssignTicketController', ['only' => ['index', 'store', 'show', 'update']]);

Route::get('dashboard', 'DashboardController@index');

 Route::get('supportticket/{id}/comment', 'Support\TicketController@getTicketComment');
Route::get('ticketfilter', 'Support\SupportTicketFilterController@index');
});
// Route::get('supporttickets', [TicketController::class, 'index']);
