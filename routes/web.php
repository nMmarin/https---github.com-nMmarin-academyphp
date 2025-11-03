<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('/users', function () {
    $users = [
        ['id' => 1, 'name' => 'Иван', 'description' => 'Бэкенд-разработчик'],
        ['id' => 2, 'name' => 'Анна', 'description' => 'Фронтенд-разработчик'],
        ['id' => 3, 'name' => 'Сергей', 'description' => 'Дизайнер'],
    ];

    return view('child', compact('users'));
});
Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
