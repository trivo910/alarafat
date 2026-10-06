<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPackageController;
use App\Http\Controllers\AdminSmtpSettingsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PackageEnquiryController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PackageController::class, 'home']);

Route::get('/hajj', [PackageController::class, 'hajj']);

Route::get('/ziyarat', [PackageController::class, 'ziyarat']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'send'])->name('contact.submit');

Route::get('/packages', [PackageController::class, 'allPackages'])->name('packages.index');

Route::get('/umrah-package-from-mumbai', [PackageController::class, 'umrah']);

Route::get('/ramzan-umrah-package-from-mumbai', [PackageController::class, 'ramzan']);

Route::get('/st-tour/{slug}', [PackageController::class, 'show'])->name('packages.show');
Route::post('/st-tour/{slug}/enquiry', [PackageEnquiryController::class, 'store'])->name('packages.enquiry');

Route::get('/blog', [BlogController::class, 'publicIndex']);

Route::get('/blog/{slug}', function (string $slug) {
    return redirect()->route('blog.show', ['slug' => $slug], 301);
});

Route::get('/admin', function () {
    return redirect()->route(auth()->check() ? 'admin.dashboard' : 'admin.login');
});

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login']);
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/enquiries', [AdminDashboardController::class, 'enquiries'])->name('admin.enquiries');
    Route::get('/enquiries/{enquiry}', [AdminDashboardController::class, 'showEnquiry'])->name('admin.enquiries.show');
    Route::get('/smtp', [AdminSmtpSettingsController::class, 'edit'])->name('admin.smtp.edit');
    Route::put('/smtp', [AdminSmtpSettingsController::class, 'update'])->name('admin.smtp.update');
    Route::get('/packages', [AdminPackageController::class, 'index'])->name('admin.packages.index');
    Route::post('/packages', [AdminPackageController::class, 'store'])->name('admin.packages.store');
    Route::get('/packages/{package}/edit', [AdminPackageController::class, 'edit'])->name('admin.packages.edit');
    Route::put('/packages/{package}', [AdminPackageController::class, 'update'])->name('admin.packages.update');
    Route::delete('/packages/{package}', [AdminPackageController::class, 'destroy'])->name('admin.packages.destroy');
    Route::get('/blogs', [BlogController::class, 'index'])->name('admin.blogs.index');
    Route::post('/blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

Route::get('/{slug}', [BlogController::class, 'showPublic'])->name('blog.show');
