<?php

use Illuminate\Support\Facades\Route;
use App\Task;
use Illuminate\Http\Request;

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
//display all tasks
Route::get('/', function () {
    return view('tasks');
});

//add a new task
Route::post('/task',function (Request $request){
    //
});

//delete an existing task
Route::delete('/task/{id}',function ($id){
    //
});



