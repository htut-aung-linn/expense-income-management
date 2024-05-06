<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\dataManage;

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

Route::post('/new',[dataManage::class, 'newData']);

Route::view('/newInfo','new');

Route::get('/delete/{id}', [dataManage::class, 'del']);

Route::get('/History',[dataManage::class,'initHistory']);

Route::get('/History/{count}',[dataManage::class,'getMore']);

Route::get('/edit/{id}',[dataManage::class,'showEdit']);

Route::get('/', [dataManage::class, 'showHome']);