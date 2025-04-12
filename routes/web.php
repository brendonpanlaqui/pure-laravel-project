<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AdminController;
use App\Models\Job;

/*
--------------------------------------------------------------------------
| Web Routes
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

Route::get('/', function () {
    return view('welcome');
});

// Admin Dashboard
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // User Management
    Route::prefix('admin/users')->name('admin.users.')->group(function () {
        Route::get('/', [AdminController::class, 'manageUsers'])->name('index');
        Route::get('{user}/edit', [AdminController::class, 'editUser'])->name('edit');
        Route::put('{user}', [AdminController::class, 'updateUser'])->name('update');
        Route::delete('{user}', [AdminController::class, 'deleteUser'])->name('delete');
    });

    // Job Management
    Route::prefix('admin/jobs')->name('admin.jobs.')->group(function () {
        Route::get('/', [AdminController::class, 'manageJobs'])->name('index');
        Route::get('{job}/edit', [AdminController::class, 'editJob'])->name('edit');
        Route::put('{job}', [AdminController::class, 'updateJob'])->name('update');
        Route::delete('{job}', [AdminController::class, 'deleteJob'])->name('delete');
    });

    // Application Management
    Route::prefix('admin/applications')->name('admin.applications.')->group(function () {
        Route::get('/', [AdminController::class, 'manageApplications'])->name('index');
        Route::get('{application}', [AdminController::class, 'viewApplication'])->name('view');
        Route::put('{application}/status', [AdminController::class, 'updateApplicationStatus'])->name('update');
    });
});

// Worker Dashboard
Route::middleware(['auth', 'role:worker'])->group(function () {
    Route::get('/worker-dashboard', function () {
        $jobs = Job::where('status', 'open')->get();
        return view('worker.dashboard', compact('jobs'));
    })->name('worker.dashboard');

    // Job Applications
    Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'apply'])->name('jobs.apply');
});

// Employer Dashboard
Route::middleware(['auth', 'role:employer'])->group(function () {
    // Employer Dashboard
    Route::get('/employer-dashboard', [JobController::class, 'employerDashboard'])->name('employer.dashboard');
    
    // Job Management
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');

    // Job Applications Management
    Route::get('/jobs/{job}/applications', [JobApplicationController::class, 'employerViewApplications'])->name('jobs.applications');
    Route::post('/applications/{application}/update', [JobApplicationController::class, 'updateStatus'])->name('applications.update');
});

// Job Details (accessible to ALL authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
});

// Home Page after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile Management
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Auth::routes();

Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->middleware('guest')
    ->name('password.email');

/* 
use App\Http\Controllers\Auth\RegisterController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
*/