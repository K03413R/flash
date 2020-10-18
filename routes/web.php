<?php

use App\Http\Controllers\RoutesController;
use Illuminate\Support\Facades\Route;

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
    if(auth()->user()){
        return redirect('/routes');
    }else {
        return Inertia\Inertia::render('Welcome');
    }
});
Route::delete('/routes/{route}', [RoutesController::class, 'destroy'])->middleware(['auth:sanctum', 'verified'])->name('routes-delete');
Route::get('/routes', [RoutesController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('routes');
Route::get('/routes/create', [RoutesController::class, 'create'])->middleware(['auth:sanctum', 'verified'])->name('routes-create');
Route::get('/routes/edit/{route}', [RoutesController::class, 'edit'])->middleware(['auth:sanctum', 'verified'])->name('routes-edit');
Route::post('/routes', [RoutesController::class, 'store'])->middleware(['auth:sanctum', 'verified'])->name('routes-store');
Route::post('/routes/{route}', [RoutesController::class, 'update'])->middleware(['auth:sanctum', 'verified'])->name('routes-update');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
