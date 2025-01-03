<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassCategoriesController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RenunganController;
use App\Models\Attendance;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('class_categories', ClassCategoriesController::class);
    Route::resource('children', ChildController::class);
    Route::resource('events', EventController::class);
    Route::resource('notes', NoteController::class);
    Route::resource('renungans', RenunganController::class);
    Route::get('attendances', [AttendanceController::class, 'index'])->name('attendances.index');
    Route::post('attendances', [AttendanceController::class, 'store'])->name('attendances.store');
    Route::get('attendances/create/{event_id}', [AttendanceController::class, 'create'])->name('attendances.create');
    Route::post('/attendances/process', [AttendanceController::class, 'process'])->name('attendances.process');
    Route::post('/attendances', [AttendanceController::class, 'attend'])->name('attendances.attend');
    Route::post('/attendances/out', [AttendanceController::class, 'attendout'])->name('attendances.attendout');
    Route::get('/attendances/history', [AttendanceController::class, 'history'])->name('attendances.history');
    Route::get('/attendances/historycheckout', [AttendanceController::class, 'historycheckout'])->name('attendances.historycheckout');
    Route::get('/attendances/indexkaka', [AttendanceController::class, 'indexkaka'])->name('attendances.indexkaka');
    Route::post('/attendances/indexkaka', [AttendanceController::class, 'attendkaka'])->name('attendances.attendkaka');
    Route::post('/attendances/out', [AttendanceController::class, 'attendoutkaka'])->name('attendances.attendoutkaka');
    Route::post('/attendances/attendout', [AttendanceController::class, 'attendOut'])->name('attendances.attendout');


});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
