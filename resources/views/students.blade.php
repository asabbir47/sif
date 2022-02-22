@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <div class="">{{ __('Student List') }}</div>
                  <div class="">
                    <button id="add_student" class="btn btn-success" type="button" name="button">Add</button>
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
                      <th>Actions</th>
                    </thead>
                    <tbody>
                      @foreach ($students as $student)
                          <tr data-info="{{ json_encode($student) }}">
                            <td> {{ $student->student_id }} </td>
                            <td> {{ $student->name }} </td>
                            <td> {{ $student->fname }} </td>
                            <td> {{ $student->mname }} </td>
                            <td> {{ $student->dob }} </td>
                            <td>
                              <div class="d-flex justify-content-around">
                                <i class="update_student fa fa-pencil" data-id = "{{ $student->id }}"  style="font-size:24px;color:blue;cursor:pointer;" aria-hidden="true"></i>
                                <form onclick='this.submit()' action='/students/{{ $student->id }}'
                                    method="post">
                                  @csrf @method('DELETE')
                                  <a type='submit'><i  class="delete_student fa fa-trash" data-id = "{{ $student->id }}"  style="font-size:24px;color:red;cursor:pointer;" aria-hidden="true"></i></a>
                              </form>

                              </div>
                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="add_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" id="add_student_modal" method="post" action="/students">
          @csrf
          <div class="form-group">
            <label for="">Student Id</label>
            <input type="number" name="student_id" class="form-control" placeholder="Enter Id" required>
          </div>
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
          </div>

          <div class="form-group">
            <label for="">Father's Name</label>
            <input type="text" name="fname" class="form-control" placeholder="Enter Father's Name">
          </div>

          <div class="form-group">
            <label for="">Mother's Name</label>
            <input type="text" name="mname" class="form-control" placeholder="Enter Mother's Name">
          </div>

          <div class="form-group">
            <label for="">Date of Birth</label>
            <input type="date" name="dob" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="update_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" id="update_student_modal" method="post" action="/students">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="">Student Id</label>
            <input type="number" name="student_id" class="form-control" placeholder="Enter Id" required>
          </div>
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
          </div>

          <div class="form-group">
            <label for="">Father's Name</label>
            <input type="text" name="fname" class="form-control" placeholder="Enter Father's Name">
          </div>

          <div class="form-group">
            <label for="">Mother's Name</label>
            <input type="text" name="mname" class="form-control" placeholder="Enter Mother's Name">
          </div>

          <div class="form-group">
            <label for="">Date of Birth</label>
            <input type="date" name="dob" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')

<script type="text/javascript">
  console.log('hello world');

  $(document).on('click','.update_student',function(){
    $('#update_modal').modal('show');

    var data = $(this).closest('tr').data('info');
    console.log(data);
    // var data_a = JSON.parse(data);
    // console.log($('#update_student_modal').find("input[name='student_id']"));
    $('#update_student_modal').find("input[name='student_id']").val(data.student_id);
    $('#update_student_modal').find("input[name='name']").val(data.name);
    $('#update_student_modal').find("input[name='fname']").val(data.fname);
    $('#update_student_modal').find("input[name='mname']").val(data.mname);
    $('#update_student_modal').find("input[name='dob']").val(data.dob);

    $('#update_student_modal').attr('action','students/'+data.id);

  });

  $(document).on('click','#add_student',function(){
    $('#add_modal').modal('show');
  });


  // $('#add_student_modal').on('submit',function(e){
  //   e.preventDefault();
  //
  //     var serialized = $( this ).serializeArray();
  //
  //     var json = {};
  //
  //     for (var i = 0; i < serialized.length; i++) {
  //       json[serialized[i].name] = serialized[i].value;
  //     }
  //
  //     console.log(json);
  //
  //     // return;
  //
  //     $.ajax({
  //       url: "/students",
  //       data: json,
  //       method: 'post',
  //       success: function(){
  //         console.log('here');
  //       }
  //     }).done(function() {
  //
  //     });
  // });

</script>

@endsection
