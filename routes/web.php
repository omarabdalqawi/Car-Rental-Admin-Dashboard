<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CarsController;


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
// routes/web.php

// Route::group(['prefix' => LaravelLocalization::setLocale()], function()
// {
// 	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
// 	Route::get('/', function()
// 	{
// 		return View::make('hello');
// 	});

// 	Route::get('test',function(){
// 		return View::make('test');
// 	});
// });

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/
Route::group(['prefix' => LaravelLocalization::setLocale(),
              'middleware' => [ 'localize' ]], function () {

    Route::get(LaravelLocalization::transRoute('routes.about'), function () {
        return view('about');
    });

    Route::get(LaravelLocalization::transRoute('routes.article'), function (\App\Article $article) {
        return $article;
    });

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::group(['middleware' => ['auth']], function() {
            Route::get('/dashboard', function () {
                     return view('pages.dashboard');})->name('dashboard');
                    });
            Route::get('/signin',[HomeController::class,'signin'])->name('signin');
            Route::get('/signup',[HomeController::class,'signup'])->name('signup');
         Route::group(['middleware' => ['auth']], function() {
            Route::resource('roles', RoleController::class);
            Route::resource('users', UserController::class);
            Route::resource('products', ProductController::class);
            Route::resource('cars', CarsController::class);
        });



    });
});



require __DIR__.'/auth.php';
