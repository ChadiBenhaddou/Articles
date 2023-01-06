<?php

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticalsController;
use App\Http\Controllers\WriterController;


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
Route::get('/',function(){
    return redirect(route('articles.index'));
});

Route::resource('articles', ArticalsController::class);



Route::name('writer.')->group(function () {
    
        Route::post('/filter', [WriterController::class, 'filter'])->name('filter');
    
        Route::get('/create', [WriterController::class, 'create'])->name('create');

        Route::post('/', [WriterController::class, 'store'])->name('store');
    
});









Route::get('/err', function () {
    return view('err');
});


