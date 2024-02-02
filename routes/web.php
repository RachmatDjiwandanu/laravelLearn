<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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


Route::get('/', function (){
    return view ('template.index',[
        'tittle' => 'Index'
    ]);
}
);

Route::get('/edit', function (){
    return view ('template.edit',[
        'tittle' => 'edit'
    ]);
}
);
Route::get('/template/contact', [ContactController::class, 'index'])->name('template.contact');
Route::resource('/contact', ContactController::class,);
Route::get('/contact/edit/{id}', [ContactController::class, 'edit'])->name('template.edit');
Route::put('/contact/update/{id}', [ContactController::class, 'update'])->name('template.update');
Route::delete('/contact/delete/{id}', [ContactController::class, 'destroy'])->name('template.delete');
