<?php

use Illuminate\Support\Facades\Route;
use Laravel\Octane\Facades\Octane;

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

$startedAt = now();

Route::get('/', function () use ($startedAt) {
    return [
        'startedAt' => $startedAt,
        'env-variable' => $_ENV['APP_FOO'] ?? 'not defined',
        'env-function' => env('APP_FOO'),
        'env-config' => config('app.foo'),
    ];
});

Route::get('/concurrently', function () {
    return Octane::concurrently([
        fn () => \App\Models\User::all(),
        fn () => \App\Models\User::all(),
    ]);
});





