<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PenconsultationController;
use App\Http\Controllers\UpdateUser;
use App\Http\Controllers\UserChat;
use App\Http\Controllers\AdminChat;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\GenerateReportController;

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

Route::get('/frontview/homesection', function () {
    return view('frontview/homesection');
});
Route::get('/dashboard/user/profile', function () {
    return view('dashboard/user/profile');
});






Auth::routes();
//Front Pages
Route::get('/', [HomeController::class, 'homesection']);
Route::match(['get', 'post'],'/login',  [LoginController::class, 'login']);
Route::match(['get', 'post'], '/register', [RegisterController::class, 'register']);
Route::get('/logout', [LoginController::class, 'logout']);

// Users Routes List
Route::get('/home', [HomeController::class, 'home']);
Route::get('/dashboard/home', [ConsultationController::class, 'ConsultationView']);
Route::post('consultation_form', [ConsultationController::class, 'AddConsultation']);
Route::post('consultation_form', [ConsultationController::class, 'TrainingAddConsultation']);
Route::match(['post', 'get'], '/profile{id}', [UpdateUser::class, 'showData']);
Route::get('priceQoutation', [UserDashboard::class, 'priceQoutation']);//price Qoutation

// User Dashboard Routes List 
Route::get('/dashboard/user/userside_pendingconsultation', [UserDashboard::class, 'UserDashboardTransation']);
Route::get('/userside_pendingconsultation', [UserDashboard::class, 'myTransactions']);
Route::get('/dashboard/user/profile', [UserDashboard::class, 'pendingConsultations']);
// End User Dashboard Routes List 

//Messaging Routes User
Route::match(['post', 'get'], '/userchat', [UserChat::class, 'userchat']);
Route::match(['get', 'post'], '/chatadminnow/{id}', [UserChat::class, 'chatnow']);
Route::match(['get', 'post'], '/adminchatshow/{id}', [UserChat::class, 'adminchatshow']);
Route::get('/adminget', [UserChat::class, 'admins']);
Route::match(['get', 'post'], '/sendfilesuser', [UserChat::class, 'sendfiles']);
Route::match(['get', 'post'], '/sendimage', [UserChat::class, 'sendmultimedia']);
Route::match(['get', 'post'], '/sendchattoadmin', [UserChat::class, 'sendmessage']);
Route::get('/getmessagesuser', [UserChat::class, 'messages']);
//End User Route


// All Admin Routes List
Route::get('dashboard/adminHome', [adminDashboard::class, 'Showusers']);
Route::get('/adminhome', [adminDashboard::class, 'Showusers']);
Route::get('dashboard/admin_panel/p_consultation', [PenconsultationController::class, 'show']);
Route::get('dashboard/admin_panel/p_consultation', [PenconsultationController::class, 'pending_consultation']);
Route::get('/dashboard/admin_panel/p_consultation', [PenconsultationController::class, 'show_pendingUsers']);
Route::get('/view_pendingconsultationadmin', [PenconsultationController::class, 'view_pendingconsultation']);
Route::get('/view_pendingconsultation/{id}', [PenconsultationController::class, 'AdminConsultations']);
Route::match(['get','post'],'/Products', [AdminDashboard::class, 'toProducts']);
Route::post('/addProducts', [AdminDashboard::class, 'addProducts']);
Route::get('deleteOffer/{offer}', [AdminDashboard::class, 'destroy']);//delete
Route::match(['get','post'],'update/{id}', [AdminDashboard::class, 'update']);//update
// ->name('items.update');
Route::get('/dashboard/admin_panel/generate_reports',[GenerateReportController::class, 'viewGeneratereports']);
Route::get('/viewConsultation/{id}/{id1}',[PenconsultationController::class, 'viewConsultation']);









//Messaging Routes Admin
Route::get('/adminchat', [AdminChat::class, 'chat']);
Route::get('/userget', [AdminChat::class, 'users']);
Route::match(['get', 'post'], '/chatnow/{id}', [AdminChat::class, 'chatnow']);
Route::match(['get', 'post'], '/userchatshow/{id}', [AdminChat::class, 'userchatshow']);
Route::match(['get', 'post'], '/sendchat', [AdminChat::class, 'sendmessage']);
Route::match(['get', 'post'], '/sendimageadmin', [AdminChat::class, 'sendmultimedia']);
Route::match(['get', 'post'], '/sendfilesadmin', [AdminChat::class, 'sendfiles']);
Route::get('/getmessagesadmin', [AdminChat::class, 'messages']);






// Route::middleware(['auth', 'user-access:admin'])->group(function () {
// });



//Admin Panel Routes
//Route to Transaction in Admin
// Route::get('/dashboard/admin_panel/p_consultation', function () {
//     return view('/dashboard/admin_panel/p_consultation');
// });

// Route::get('dashboard/adminHome', function () {
//     return view('dashboard/adminHome');
// });
