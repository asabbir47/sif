<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\students;

class StudentsController extends Controller
{
    public function index()
    {
        $students = new students();
        $studentsPaginatedData = $students->paginate(10);
        // dd($studentsPaginatedData);
        return view('students',[
          'students' => $studentsPaginatedData
        ]);
    }
}
