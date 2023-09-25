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

        if(!$validatedData) {
            return response()->json(['message' => 'Invalid']);
        };
        $data = request()->json()->all();
        $nilai = ($data['nilai_quiz'] + $data['nilai_tugas'] + $data['nilai_absensi'] + $data['nilai_praktek'] + $data['nilai_uas'])/5;
        $grade = 'D';
        if ($nilai > 65 && $nilai <= 75) {
            $grade = 'C';
        };
        if($nilai > 75 && $nilai <= 85) {
            $grade = 'B';
        };

        if($nilai > 85 && $nilai <= 100) {
            $grade = 'A';
        };

        $data['grade'] = $grade;

        DB::table('students')->insert([$data]);

        return response()->json($data, 201);
    }

    static public function getGrades() {
        $rangkuman = DB::table('students')->select(array('grade', DB::raw('COUNT(idStudents) as jumlah')))->groupBy('grade')->get();
        return $rangkuman;
    }

    static public function getStudents() {
        $students = DB::table('students') -> select('*')->get();
        return $students;
    }
}
