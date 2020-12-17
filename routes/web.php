<?php
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
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


Route::get('tasks',function(){
    $tasks= DB::table('tasks')->get();
    return view('tasks',compact('tasks'));

});



Route::get('tasks/show/{id}', function($id){
    $task= DB::table('tasks')-> find($id);
    // dd($tasks);
    return view('show',compact('task'));

});

Route::get('todo', function(){

    // $tasks = DB::table('tasks')->get();
    $tasks = Task::all();
    return view('todo', compact('tasks'));

});


Route::post('store',function(Request $request){

    // DB::table('tasks')->insert([
    //     'title'=> $request->title
    // ]);
    $task = new Task();
    $task->title = $request->title;
    $task->save();
    return redirect()->back();
});


Route::post('task/{id}', function($id){
    // DB::table('tasks')->where('id','=', $id)->delete();
    $flight = Task::find($id);
    $flight->delete();
    return redirect()->back();

});



// Route::get('about', function () {
//     $name='Abed Bahour';
//     return view('about',compact('name'));
// });


// Route::get('contact', function () {
//     return view('contact');
// });

// Route::post('send', function (Request $Request) {
//     $name= $Request->myName;
//     return view('about',compact('name'));
// });

// Route::get('tasks', function () {
//     $tasks=[
//        '1' => 'Task 1',
//        '2' => 'Task 2',
//        '3' => 'Task 3',
//        '4' => 'Task 4',
//        '5' => 'Task 5'
//     ];
//     return view('tasks',compact('tasks'));
    
   
// });

// Route::get('task/show/{id}', function ($id) {
//     $tasks=[
//         '1' => 'Task 1',
//         '2' => 'Task 2',
//         '3' => 'Task 3',
//         '4' => 'Task 4',
//         '5' => 'Task 5'
//      ];
//      $task = $tasks[$id];
//     return view('show',compact('task'));
// });