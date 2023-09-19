<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function addStudent(Request $request)
    {
        // Validate the incoming request data
        print_r($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string',
            'nilai_quiz' => 'required|numeric',
            'nilai_tugas' => 'required|numeric',
            'nilai_absensi' => 'required|numeric',
            'nilai_praktek' => 'required|numeric',
            'nilai_uas' => 'required|numeric',
        ]);

        $data = request()->json()->all();

        DB::table('students')->insert([$data]);

        return response()->json($data, 201);
    }

    static public function getStudent(string $studentId) {
        $students = DB::table('students')->select('*')->where('idStudents', '=', $studentId)->get();
        return $students;
    }
}
