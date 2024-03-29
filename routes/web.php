<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;

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

route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );

    # index
    Route::get(
        '/complaint',
        'App\Http\Controllers\ComplaintController@index'
    )->name('complaint');

    Route::get('/complaints/{id}', 'ComplaintController@show');
    # create
    Route::get(
        '/complaint/create',
        'App\Http\Controllers\ComplaintController@create'
    )->name('complaint.create');
    #store
    Route::post(
        '/complaint',
        'App\Http\Controllers\ComplaintController@store'
    )->name('complaint.store');
    #destroy
    Route::delete(
        '/complaint/{id}',
        'App\Http\Controllers\ComplaintController@destroy'
    )
        ->middleware('auth', 'role:admin')
        ->name('complaint.destroy');
    #edit
    Route::get(
        '/complaint/{id}/edit',
        'App\Http\Controllers\ComplaintController@edit'
    )
        ->middleware('auth', 'role:admin')
        ->name('complaint.edit');
    #update
    Route::patch(
        '/complaint/{id}',
        'App\Http\Controllers\ComplaintController@update'
    )
        ->middleware('auth', 'role:admin,petugas')
        ->name('complaint.update');

    Route::get(
        '/categories',
        'App\Http\Controllers\CategoryController@index'
    )->name('category');

    Route::get(
        '/categories/create',
        'App\Http\Controllers\CategoryController@create'
    )->name('category.create');

    Route::post(
        '/categories',
        'App\Http\Controllers\CategoryController@store'
    )->name('category.store');

    Route::get(
        '/dashboard/comment/{id}',
        'App\Http\Controllers\CommentController@index'
    )->name('comment');
    Route::post(
        '/dashboard/comment/{id}',
        'App\Http\Controllers\CommentController@store'
    )->name('comment.store');

    #logs
    Route::get('/logs', 'App\Http\Controllers\LogController@index')
        ->middleware('auth')
        ->name('logs');

    Route::get('/logs', 'App\Http\Controllers\LogController@index')
        ->middleware('auth')
        ->name('logs.index');

    Route::get('/logs/export', 'App\Http\Controllers\LogController@exportToPDF')
        ->middleware('auth')
        ->name('logs.export');
});

require __DIR__ . '/auth.php';
