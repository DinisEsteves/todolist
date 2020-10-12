<?php

use App\Http\Controllers\TodoControllerAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Todo endpoints
|--------------------------------------------------------------------------
 */
Route::name('todos.')->prefix('todos')->group(function () {
    Route::get('/', [TodoControllerAPI::class, 'index'])->name('index');
    Route::post('/', [TodoControllerAPI::class, 'store'])->name('create');
    Route::get('/{todo}', [TodoControllerAPI::class, 'show'])->name('show');
    Route::patch('/{todo}', [TodoControllerAPI::class, 'update'])->name('update');
    Route::delete('/{todo}', [TodoControllerAPI::class, 'destroy'])->name('destroy');
});
