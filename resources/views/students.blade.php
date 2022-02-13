@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <div class="">{{ __('Student List') }}</div>
                  <div class="">
                    <button type="button" name="button">Add</button>
                  </div>
                </div>


                <div class="card-body">
                  <table class="table">
                    <thead>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Father</th>
                      <th>Mother</th>
                      <th>Date of Birth</th>
                    </thead>
                    <tbody>
                      @foreach ($students as $student)
                          <tr>
                            <td> {{ $student->student_id }} </td>
                            <td> {{ $student->name }} </td>
                            <td> {{ $student->fname }} </td>
                            <td> {{ $student->mname }} </td>
                            <td> {{ $student->dob }} </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
