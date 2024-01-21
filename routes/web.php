<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

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


// -------------------Back End ----------------------//
// Landing Page

Route::get('/', function (){
    return view('pages.home');
});

// Api Routes

Route::post('/user-registration', [UserController::class , 'UserRegistration']);
Route::post('/user-login', [UserController::class, 'UserLogin']);
Route::post('/user-send-otp', [UserController::class, 'SendOTP']);
Route::post('/user-verify-otp', [UserController::class, 'VerifyOTP']);

// Reset Password

Route::post('/user-reset-password', [UserController::class, 'ResetPass'])->middleware([TokenVerificationMiddleware::class]);

// Logout Route

Route::get('/user-logout', [UserController::class, 'Logout']);

// Profile

Route::get('/user-profile-details', [UserController::class, 'User_Profile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-profile-update', [UserController::class, 'User_Profile_Update'])->middleware([TokenVerificationMiddleware::class]);


//-------------------------Front End-----------------------------//

// Page Routes

Route::get('/user-registration', [UserController::class, 'Registration_Page']);
Route::get('/user-login', [UserController::class,  'Login_Page']);
Route::get('/user-send-otp', [UserController::class, 'Send_OTP_Page']);
Route::get('/user-verify-otp', [UserController::class, 'Verify_OTP_Page']);
Route::get('/user-reset-password', [UserController::class, 'Reset_Password_Page'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/user-dashboard', [UserController::class, 'Dashboard_Page'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/user-profile', [UserController::class, 'Profile_Page'])->middleware ([TokenVerificationMiddleware::class]);
































//Route::get('/',[HomeController::class,'HomePage']);
//Route::get('/userLogin',[UserController::class,'LoginPage']);
//Route::get('/userRegistration',[UserController::class,'RegistrationPage']);
//Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
//Route::get('/verifyOtp',[UserController::class,'VerifyOTPPage']);
//Route::get('/resetPassword',[UserController::class,'ResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);
//Route::get('/dashboard',[DashboardController::class,'DashboardPage'])->middleware([TokenVerificationMiddleware::class]);
//Route::get('/userProfile',[UserController::class,'ProfilePage'])->middleware([TokenVerificationMiddleware::class]);
//Route::get('/categoryPage',[CategoryController::class,'CategoryPage'])->middleware([TokenVerificationMiddleware::class]);
//Route::get('/customerPage',[CustomerController::class,'CustomerPage'])->middleware([TokenVerificationMiddleware::class]);
//Route::get('/productPage',[ProductController::class,'ProductPage'])->middleware([TokenVerificationMiddleware::class]);
//Route::get('/invoicePage',[InvoiceController::class,'InvoicePage'])->middleware([TokenVerificationMiddleware::class]);
//Route::get('/salePage',[InvoiceController::class,'SalePage'])->middleware([TokenVerificationMiddleware::class]);
//Route::get('/reportPage',[ReportController::class,'ReportPage'])->middleware([TokenVerificationMiddleware::class]);
