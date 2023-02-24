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
});

require __DIR__ . '/auth.php';
