<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use App\Mail\ContactConfirmation;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/workers', [WorkerController::class, 'index'])->name('workers.index');
Route::get('/workers/{worker}', [WorkerController::class, 'show'])->name('workers.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string'
    ]);

    Mail::to(env('CONTACT_EMAIL', 'support@hiremate.lk'))->send(new ContactMessage($data));

    // Send confirmation email to the person who submitted the form
    Mail::to($data['email'])->send(new ContactConfirmation($data));

    return back()->with('success', 'Your message has been sent successfully! We will get back to you soon.');
})->name('contact.send');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/profile', [AdminController::class, 'editProfile'])->name('profile.edit');
    Route::patch('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');
    Route::put('/password', [AdminController::class, 'updatePassword'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
