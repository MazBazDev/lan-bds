<?php

use App\Http\Controllers\BracketController;
use App\Models\User;
use App\Models\Teams;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\SettingsController;
use App\Models\Brackets;

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
Route::get('/maintenance', function () {
    if(setting("maintenance")) {
        return view('pages.maintenance');
    } else {
        return redirect()->route("home");
    }
})->name("maintenance");

Route::middleware(['maintenance'])->group(function () {    
    Route::get('/', function () {
        return view('pages.welcome');
    })->name("home");
    
    Route::get('/planning', [EventsController::class, "home"])->name("planning");
    
    Route::get('/rules', function () {
        return view('pages.rules');
    })->name("rules");
    
    Route::get('/teams', [TeamsController::class, "home"])->name("teams");
    Route::get('/teams/{team}', [TeamsController::class, "home_show"])->name("teams.show");
    
    
    Route::get('/brackets', [BracketController::class, "home"])->name("brackets");
    Route::get('/brackets/{bracket}', [BracketController::class, "home_show"])->name("brackets.show");

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/profil', [UserController::class, "home_show"])->name('profil');
        Route::put('/profil/{user}', [UserController::class, "home_update"])->name('profil_update');
    });
});

Route::middleware(['auth', 'verified', "isModo"])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view("admin.welcome", [
            "teams" => Teams::count(),
            "users" => User::count(),
        ]);
    })->name('home');

    
    Route::resource("teams", TeamsController::class, [
        'except' => ['show']
    ]);
    Route::get('/brackets', [BracketController::class, "index"])->name('bracket.index');

    Route::resource("brackets", BracketController::class, [
        'except' => ['show']
    ]);

    Route::resource("users", UserController::class, [
        'except' => ['show']
    ]);


    Route::middleware(["isAdmin"])->group(function () {
        Route::get('/clear', function () {
            exec('php artisan route:cache');
            exec("php artisan view:cache");
            exec('php artisan config:cache');
            exec('composer install --optimize-autoloader --no-dev');
        });
        
        Route::get('/rules', [RulesController::class, "index"])->name('rules');
        Route::put('/general', [RulesController::class, "general"])->name('rulesGeneral');
        Route::put('/baby', [RulesController::class, "baby"])->name('rulesBaby');
        Route::put('/lg', [RulesController::class, "lg"])->name('rulesLg');
        Route::put('/valo', [RulesController::class, "valo"])->name('rulesValo');
        Route::put('/lol', [RulesController::class, "lol"])->name('rulesLol');
        Route::put('/smash', [RulesController::class, "smash"])->name('rulesSmash');
        Route::put('/rl', [RulesController::class, "rl"])->name('rulesRl');
    
    
        Route::get('/settings', [SettingsController::class, "index"])->name('settings');
        Route::post('/settings', [SettingsController::class, "update"])->name('settings.update');
    
        Route::resource("events", EventsController::class, [
            'except' => ['show']
        ]);
    });
    
  
});
require __DIR__.'/auth.php';
