<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\CalendarEventController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\RoomBorrowingController;
use App\Http\Controllers\AdminBorrowingController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;

Route::get('/', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');

//User
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'user']);

    Route::get(
        '/change-password',
        [ProfileController::class, 'changePasswordForm']
    );

    Route::post(
        '/change-password',
        [ProfileController::class, 'changePassword']
    );

    Route::get('/rooms', [RoomController::class, 'index']);

    Route::get(
        '/rooms/{id}',
        [RoomController::class, 'show']
    );

    Route::get(
        '/my-borrowings',
        [RoomBorrowingController::class, 'index']
    );

    Route::get(
        '/my-borrowings/create',
        [RoomBorrowingController::class, 'create']
    );

    Route::post(
        '/my-borrowings',
        [RoomBorrowingController::class, 'store']
    );

    Route::get(
        '/my-borrowings/{id}',
        [RoomBorrowingController::class, 'show']
    );

    Route::post(
        '/my-borrowings/{id}/cancel',
        [RoomBorrowingController::class, 'cancel']
    );

    Route::get(
        '/my-borrowings/{id}/proposal',
        [RoomBorrowingController::class, 'proposal']
    );

    Route::get(
        '/verify/{id}',
        [RoomBorrowingController::class, 'verify']
    );

    Route::get(
        '/borrowings/{id}/qr',
        [RoomBorrowingController::class, 'qr'
    ]);

    Route::get(
        '/notifications',
        [NotificationController::class, 'index']
    );

    Route::post(
        '/notifications/{id}/read',
        [NotificationController::class, 'read']
    );

    Route::get(
        '/profile',
        [ProfileController::class, 'profile']
    );

    Route::get('/about', function () {
        return view('about');
    });
});

// Admin

Route::middleware('admin')->group(function () {

    Route::get(
        '/admin/dashboard',
        [DashboardController::class, 'admin']
    );

    // ANNOUNCEMENTS
    Route::get(
        '/admin/announcements',
        [AnnouncementController::class, 'index']
    );

    Route::get(
        '/admin/announcements/create',
        [AnnouncementController::class, 'create']
    );

    Route::post(
        '/admin/announcements',
        [AnnouncementController::class, 'store']
    );

    Route::get(
        '/admin/announcements/{id}/edit',
        [AnnouncementController::class, 'edit']
    );

    Route::put(
        '/admin/announcements/{id}',
        [AnnouncementController::class, 'update']
    );

    Route::delete(
        '/admin/announcements/{id}',
        [AnnouncementController::class, 'destroy']
    );

    // RULES
    Route::get(
        '/admin/rules',
        [RuleController::class, 'index']
    );

    Route::get(
        '/admin/rules/create',
        [RuleController::class, 'create']
    );

    Route::post(
        '/admin/rules',
        [RuleController::class, 'store']
    );

    Route::get(
        '/admin/rules/{id}/edit',
        [RuleController::class, 'edit']
    );

    Route::put(
        '/admin/rules/{id}',
        [RuleController::class, 'update']
    );

    Route::delete(
        '/admin/rules/{id}',
        [RuleController::class, 'destroy']
    );

    // CALENDAR
    Route::get(
        '/admin/calendar',
        [CalendarEventController::class, 'index']
    );

    Route::get(
        '/admin/calendar/create',
        [CalendarEventController::class, 'create']
    );

    Route::post(
        '/admin/calendar',
        [CalendarEventController::class, 'store']
    );

    Route::get(
        '/admin/calendar/{id}/edit',
        [CalendarEventController::class, 'edit']
    );

    Route::put(
        '/admin/calendar/{id}',
        [CalendarEventController::class, 'update']
    );

    Route::delete(
        '/admin/calendar/{id}',
        [CalendarEventController::class, 'destroy']
    );

    // FACULTIES
    Route::get(
        '/admin/faculties',
        [FacultyController::class, 'index']
    );

    Route::get(
        '/admin/faculties/create',
        [FacultyController::class, 'create']
    );

    Route::post(
        '/admin/faculties',
        [FacultyController::class, 'store']
    );

    Route::get(
        '/admin/faculties/{id}/edit',
        [FacultyController::class, 'edit']
    );

    Route::put(
        '/admin/faculties/{id}',
        [FacultyController::class, 'update']
    );

    Route::delete(
        '/admin/faculties/{id}',
        [FacultyController::class, 'destroy']
    );

    // ROOMS
    Route::get(
        '/admin/rooms',
        [AdminRoomController::class, 'index']
    );

    Route::get(
        '/admin/rooms/create',
        [AdminRoomController::class, 'create']
    );

    Route::post(
        '/admin/rooms',
        [AdminRoomController::class, 'store']
    );

    Route::get(
        '/admin/rooms/{id}/edit',
        [AdminRoomController::class, 'edit']
    );

    Route::put(
        '/admin/rooms/{id}',
        [AdminRoomController::class, 'update']
    );

    Route::delete(
        '/admin/rooms/{id}',
        [AdminRoomController::class, 'destroy']
    );

    // BORROWINGS
    Route::get(
        '/admin/borrowings',
        [AdminBorrowingController::class, 'index']
    );

    Route::get(
        '/admin/borrowings/{id}',
        [AdminBorrowingController::class, 'show']
    );

    Route::get(
        '/admin/borrowings/{id}/reject',
        [AdminBorrowingController::class, 'rejectForm']
    );

    Route::post(
        '/admin/borrowings/{id}/approve',
        [AdminBorrowingController::class, 'approve']
    );

    Route::post(
        '/admin/borrowings/{id}/reject',
        [AdminBorrowingController::class, 'reject']
    );

    // USERS
    Route::get(
        '/admin/users',
        [AdminUserController::class, 'index']
    );

    Route::get(
        '/admin/users/create',
        [AdminUserController::class, 'create']
    );

    Route::post(
        '/admin/users',
        [AdminUserController::class, 'store']
    );

    Route::get(
        '/admin/users/{id}/edit',
        [AdminUserController::class, 'edit']
    );

    Route::put(
        '/admin/users/{id}',
        [AdminUserController::class, 'update']
    );

    Route::post(
        '/admin/users/{id}/toggle',
        [AdminUserController::class, 'toggle']
    );

    Route::post(
        '/admin/users/{id}/reset-password',
        [AdminUserController::class, 'resetPassword']
    );

    Route::get(
        '/admin/borrowings/export-pdf',
        [AdminBorrowingController::class, 'exportPdf']
    );

    Route::get(
        '/admin/borrowings/{id}/pdf',
        [AdminBorrowingController::class, 'downloadPdf']
    );

    Route::get(
        '/admin/borrowings/{id}/preview',
        [AdminBorrowingController::class, 'previewPdf']
    );
});