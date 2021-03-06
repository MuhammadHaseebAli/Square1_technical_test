<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\DashboardController;

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

Route::get('/',[HomepageController::class, 'index']);
Route::get('blog/view/{id}',[BlogsController::class, 'view']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
      Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

      Route::prefix('blog')->group(function () {
        Route::get('create',[BlogsController::class, 'create']);
        Route::post('save',[BlogsController::class, 'save']);
      });

});
