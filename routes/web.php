<?php

use App\Models\User;
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

use Illuminate\Support\Facades\Request;


Route::get('/', function () {
    return Inertia('Home', ["name" => "mario", "frameworks" => [
        "laravel", "react", "vue"
    ]]);
});

Route::get('/users', function () {
    $users = User::query()
        ->when(Request::input('search'), function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
        ->paginate(10)
        ->withQueryString()
        ->through(fn ($user) => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ]);

    $filters = Request::only(['search']);

    return Inertia('Users/Index', ["users" => $users, "filters" => $filters]);
});

Route::get('/users/create', function () {
    return Inertia('Users/Create');
});

Route::post('/users', function () {
    $validated = Request::validate([
        'name' => 'required',
        'email' => 'required|email:dns',
        'password' => 'required'
    ]);

    User::create($validated);

    return redirect('/users');
});

Route::get('/about', function () {
    return Inertia('About', ["name" => "mario", "frameworks" => [
        "laravel", "react", "vue"
    ]]);
});

Route::post('/logout', function () {
    return dd('logout');
});
