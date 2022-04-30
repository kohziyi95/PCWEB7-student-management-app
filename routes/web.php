<?php

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/main', [App\Http\Controllers\MainController::class, 'index'])->name('main');


Route::get('/grades', [App\Http\Controllers\GradeController::class, 'create'])->name('addGrades');
Route::post('/grades', [App\Http\Controllers\GradeController::class, 'save'])->name('grades.save');
Route::get('/grades/edit/{gradesId}', [App\Http\Controllers\GradeController::class, 'edit'])->name('grades.edit');
Route::post('/grades/edit/{gradesId}', [App\Http\Controllers\GradeController::class, 'update'])->name('grades.update');
Route::get('/grades/delete/{gradesId}', [App\Http\Controllers\GradeController::class, 'delete'])->name('grades.delete');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'create'])->name('createProfile');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'save'])->name('profile.save');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/edit', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::get('/testimonial', [App\Http\Controllers\TestimonialController::class, 'create'])->name('addTestimonial');
Route::post('/testimonial', [App\Http\Controllers\TestimonialController::class, 'save'])->name('testimonial.save');
Route::get('/testimonial/edit/{testimonialId}', [App\Http\Controllers\TestimonialController::class, 'edit'])->name('testimonial.edit');
Route::post('/testimonial/edit/{testimonialId}', [App\Http\Controllers\TestimonialController::class, 'update'])->name('testimonial.update');
Route::get('/testimonial/delete/{testimonialId}', [App\Http\Controllers\TestimonialController::class, 'delete'])->name('testimonial.delete');
