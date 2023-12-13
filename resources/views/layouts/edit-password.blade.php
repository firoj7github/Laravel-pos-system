@extends('layouts.app')
@section('content')
<<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
              
              <!-- /.row -->
              <!-- Main row -->
              <div class="row">
                <!-- Left col -->
                <section class="col-md-12">
                  <!-- Custom tabs (Charts with tabs)-->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Change Password</h3>
                     
                      
                      </div><!-- /.card-header -->
                       <!-- @if(session()->has('success'))
                     
                         <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ session()->get('success')}}</strong>
                          </div>
                      
                      
                      @endif  -->
                      <div class="card-body">
                        <div class="col-md-6 offset-md-3">
                         <form action="{{route('profiles.update.password')}}" id="myform" method="post">
                          @csrf
                          
                           <div class="form-group">
                           <label>Old Password</label>
                            <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Old Password" >

                             </div> 

                           <div class="form-group">
                           <label>New Password</label>
                            <input type="password" id="new_password" name="new_password" class="form-control " placeholder="New password" > 
                          </div>

                           <div class="form-group">
                           <label>Again new password</label>
                            <input type="password" name="again_new_password" id="again_new_password" class="form-control" placeholder="Conform New Password">  
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                      </div>
                      </div>
                      </div><!-- /.card-body -->
                    </section>
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.card -->
              </section>
              <!-- right col -->
            </div>


<!--Validation Javascript-->
         
@endsection

@push('script')
 <script>
$(function () {
 
  $('#myform').validate({
    rules: {
      old_password: {
        required: true,
      
      },

        new_password: {
        required: true,
        minlength: 8
      },
       again_new_password: {
        required: true,
        equalTo: '#new_password'
      },
      
    },
    messages: {
     
      old_password: {
        required: "Old password is required",
      
      },
       new_password: {
        required: "password is required",
        minlength: "Your password must be at least 8 characters long"
      },
      again_new_password: {
        required: "conform password is required",
        minlength: "new password and conform password does not match!"
      },
      
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
   
@endpush
