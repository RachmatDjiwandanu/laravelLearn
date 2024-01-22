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

Route::get('/', function () {
    return view('home', [
        'tittle' => 'Home'
    ]);
});

Route::get('/bio', function (){
    return view ('biodata', [
        'tittle' => 'Biodata'
    ]);
}
);

Route::get('/con', function (){
    return view ('contact', [
        'tittle' => 'Contact'
    ]);
}
);

Route::get('/abut', function (){
    return view ('about', [
        'tittle' => 'About'
    ]);
}
);

Route::get('/index', function (){
    return view ('template.index',[
        'tittle' => 'Index'
    ]);
}
);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);