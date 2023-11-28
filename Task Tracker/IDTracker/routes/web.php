<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}/{id?}', function ($name,$id=null) {
//    echo ('hello'.' '. $name);
//    echo ('hello'.' '. $id);
$data = compact('name','id');
   return view('hello')->with($data);
});


Route::any('/hello1', function () {
    echo ('hello1');
 });
 