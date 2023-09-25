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



Route::get('/graph', function () {
    $rangkuman =  StudentController::getGrades();
    $students = StudentController::getStudents();
    $hasil = new stdClass();
    $length = 0;
    foreach($rangkuman as $r) {
        $hasil->{$r->grade} = $r->jumlah;
        $length += $r->jumlah;
    };
    foreach(['A', 'B', 'C', 'D', 'E'] as $grade ){
        if(!isset($hasil->{$grade})) {
            $hasil->{$grade} =0;
        };
    };
    return view('graph', ["hasil" => $hasil, "length" => $length, 'students' => $students]);
});

Route::get('/', function () {
    return view('home');
});
