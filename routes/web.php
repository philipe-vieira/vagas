<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;
use App\Http\Middleware\EnsureMinimalSkills;

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
    return view('home');
})->name('home');

Route::get('/candidate/register', function () {
    return view('candidate.create');
})->name('candidate.create');

Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancies');
Route::get('/vacancy/create', [VacancyController::class, 'create'])->name('vacancy.create');
Route::get('/vacancy/update/{id}', [VacancyController::class, 'update'])->name('vacancy.update');
Route::get('/vacancy/{id}', [VacancyController::class, 'show'])->name('vacancy.id');
Route::post('/vacancy', [VacancyController::class, 'store'])
    ->name('vacancy.store')
    ->middleware(EnsureMinimalSkills::class);
Route::put('/vacancy', [VacancyController::class, 'change'])
    ->name('vacancy.change')
    ->middleware(EnsureMinimalSkills::class);
Route::delete('/vacancy', [VacancyController::class, 'delete'])->name('vacancy.delete');

