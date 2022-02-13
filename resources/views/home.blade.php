@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Student List') }}</div>

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
                      
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
