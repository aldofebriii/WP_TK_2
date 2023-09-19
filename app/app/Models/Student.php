<?php

namespace App\Models;

class Student
{
    public $name;
    public $nilai_quiz;
    public $nilai_tugas;
    public $nilai_absensi;
    public $nilai_praktek;
    public $nilai_uas;

    public function __construct($name, $nilai_quiz, $nilai_tugas, $nilai_absensi, $nilai_praktek, $nilai_uas)
    {
        $this->name = $name;
        $this->nilai_quiz = $nilai_quiz;
        $this->nilai_tugas = $nilai_tugas;
        $this->nilai_absensi = $nilai_absensi;
        $this->nilai_praktek = $nilai_praktek;
        $this->nilai_uas = $nilai_uas;
    }
}
