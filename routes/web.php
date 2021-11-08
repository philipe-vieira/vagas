<?php

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
    return view('home');
})->name('home');

Route::get('/candidate/register', function () {
    return view('candidate.create');
})->name('candidate.create');

Route::get('/vacancies', function () {
    return view('vacancies.list');
})->name('vacancies');

Route::get('/vacancy/create', function () {
    return view('vacancies.create');
})->name('vacancy.create');

Route::get('/vacancy/{id}', function ($id) {
    return "Vacancy ".$id;
})->name('vacancy.id');
