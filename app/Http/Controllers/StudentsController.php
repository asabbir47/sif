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

    public function store(Request $request)
    {

      $input = $request->all();

      // dd($input);

        $request->validate([
          'student_id' => 'required',
          'name' => 'required',
          'fname'=> '',
          'mname'=> '',
          'dob'=> ''
        ]);

        students::create($input);

        return  redirect('/students');

      // // dd($request);
      //       $v_data = $this->validate($request,[
      //         'student_id' => 'required|unique:students',
      //         'name' => 'required',
      //         'fname'=> '',
      //         'mname'=> '',
      //         'dob'=> ''
      //       ]);
      //
      //       dd($v_data);
      //
      //   $student= new students();
      //
      //   $student->create($v_data);
    }

    public function destroy($id)
    {
      // dd($id);
      $student = students::findOrFail($id);
      // dd($student);
      $student->delete();
      return back();
    }

    public function update($id)
    {
      $student = students::findOrFail($id);

      $input = $request->all();

      $request->validate([
        'student_id' => 'required',
        'name' => 'required',
        'fname'=> '',
        'mname'=> '',
        'dob'=> ''
      ]);

      $student->save($input);

      return  redirect('/students');
    }
}
