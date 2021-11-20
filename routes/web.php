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
    $tasks = Task::orderBy('created_at','asc')->get();

    return view('tasks',[
        'tasks' => $tasks
    ]);
});

//add a new task
Route::post('/task',function (Request $request){
    //nameフィールドを必須化&含まれる文字が255文字未満であること
    $validator = validator::make($request->all(),[
        'name' => 'required|max:255',
    ]);
    //もし、$validatorが条件を満たさなかった場合、/にリダイレクト&入力とエラーをセッションにフラッシュ
    if($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

//delete an existing task
Route::delete('/task/{id}',function ($id){
    //
});



