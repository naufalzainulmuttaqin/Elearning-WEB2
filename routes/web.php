<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Models\Courses;
use App\Models\Student;

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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // route untuk menampilkan student dan courses
    Route::get('admin/student', [StudentController::class, 'index']);
    Route::get('admin/courses', [CoursesController::class, 'index']);

    // route untuk menampilkan form student
    Route::get('admin/student/create', [StudentController::class, 'create']);

    // route untuk mengirim data student
    Route::post('admin/student/store', [StudentController::class, 'store']);

    // route untuk menampilkan halaman edit
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);

    //route untuk menyimpan hasil update student
    Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

    // route untuk menghapus student
    Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);

    // route courses menampilkan form
    Route::get('admin/courses/create', [CoursesController::class, 'create']);

    // route untuk mengirim data courses
    Route::post('admin/courses/store', [CoursesController::class, 'store']);

    // route untuk menampilkan halaman edit
    Route::get('admin/courses/edit/{id}', [CoursesController::class, 'edit']);

    //route untuk menyimpan hasil update courses
    Route::put('admin/courses/update/{id}', [CoursesController::class, 'update']);

    // route untuk menghapus courses
    Route::delete('admin/courses/delete/{id}', [CoursesController::class, 'destroy']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
