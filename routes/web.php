<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    DashboardController,
    GuestController,
    InvitationController,
    EventController,
    AttendanceController,
    ScanController,
    UserController
};
use Illuminate\Support\Facades\Password;

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink($request->only('email'));

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->name('password.email');

// Redirect root ke dashboard jika login, atau login page
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// 🔐 AUTH
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register routes - make sure they're outside the auth middleware group
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

// Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // GUEST
    Route::resource('guests', GuestController::class)->middleware('auth');

    // INVITATION
    Route::resource('invitations', InvitationController::class)->middleware('auth');

    // EVENT
    Route::resource('events', EventController::class)->middleware('auth');

    // ATTENDANCE
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index')->middleware('auth');
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');

    // SCAN (manual & qr input simulasi)
    Route::get('/scan', [ScanController::class, 'index'])->name('scan')->middleware('auth');
    Route::post('/scan', [ScanController::class, 'handleQr'])->name('scan.qr')->middleware('auth');


    Route::get('/manual-scan', [ScanController::class, 'manual'])->name('scan.manual')->middleware('auth');
    Route::post('/manual-scan', [ScanController::class, 'handleManual'])->name('scan.manual.submit')->middleware('auth');


    // USERS
    Route::resource('users', UserController::class)->only(['index', 'destroy'])->middleware('auth');

});
