<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\MeetController;
use App\Http\Controllers\Admin\SeenController;
use App\Http\Controllers\Admin\SocialLinksController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',[FrontendController::class, 'Index']);
Route::get('/getWorkDetails/{id}',[FrontendController::class, 'getWorkDetails']);


Auth::routes();
Auth::routes(['register' => false]);
Route::prefix('/admin')->namespace('Admin')->group(function () {
    Route::match(['get', 'post'], '/',[AdminController::class, 'login']);
    Route::middleware(['admin'])->group(function () {
    Route::get('dashboard',[AdminController::class, 'Index']);
    Route::get('logout',[AdminController::class, 'Logout']);
    Route::match(['get','post'],'/settings',[AdminController::class, 'Settings']);
    Route::post('/check-password',[AdminController::class, 'CheckPassword']);
    Route::post('/change-password',[AdminController::class, 'ChangePassword']);
    Route::get('/social/index',[SocialLinksController::class, 'Index']);
    Route::post('/updateLinkStatus',[SocialLinksController::class,'updateLinkStatus']);
    Route::get('delete-social/{id}',[SocialLinksController::class, 'Delete']);
    Route::match(['get', 'post'], '/social/edit/{id}',[SocialLinksController::class, 'Edit'] );
    Route::match(['get', 'post'], '/social/add',[SocialLinksController::class, 'Add'] );
    Route::get('/meet/index',[MeetController::class, 'Index']);
    Route::get('delete-meet/{id}',[MeetController::class, 'Delete']);
    Route::match(['get', 'post'], '/meet/edit/{id}',[MeetController::class, 'Edit'] );
    Route::match(['get', 'post'], '/meet/add',[MeetController::class, 'Add'] );
    Route::post('/updateMeetStatus',[MeetController::class,'updateMeetStatus']);
    Route::get('work/index',[WorkController::class, 'Index']);
    Route::post('/updateWorkStatus',[WorkController::class,'updateWorkStatus']);
    Route::get('delete-work/{id}',[WorkController::class, 'Delete']);
    Route::match(['get', 'post'], '/work/edit/{id}',[WorkController::class, 'Edit'] );
    Route::match(['get', 'post'], '/work/add',[WorkController::class, 'Add'] );
    Route::get('image/index',[ImageController::class, 'Index']);
    Route::get('delete-logo/{id}',[ImageController::class, 'Delete']);
    Route::match(['get', 'post'], '/logo/edit/{id}',[ImageController::class, 'Edit'] );
    Route::match(['get', 'post'], '/logo/add',[ImageController::class, 'Add'] );
    Route::post('/updateLogoStatus',[imageController::class,'updateLogoStatus']);
    Route::get('/seen/index',[SeenController::class, 'Index']);
    Route::get('delete-seen/{id}',[SeenController::class, 'Delete']);
    Route::match(['get', 'post'], '/seen/edit/{id}',[SeenController::class, 'Edit'] );
    Route::match(['get', 'post'], '/seen/add',[SeenController::class, 'Add'] );
    Route::post('/updateSeenStatus',[SeenController::class,'updateSeenStatus']);

    });

});

