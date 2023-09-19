<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\select;

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



Route::get('/graph/{id}', function ($id) {
    if(!$id) {
        $id = 1;
    };
    $student =  StudentController::getStudent($id)->first();
    $studentsList = DB::table('students')->select('idStudents as id', 'name')->get();
    return view('graph', ["student" => $student, "studentsList" => $studentsList]);
});

Route::get('/graph', function() {
    return response()->redirectTo('/graph/1');
});

Route::get('/', function () {
    return view('home');
});
