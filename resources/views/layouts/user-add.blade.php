@extends('layouts.app')
@section('content')
<<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add User</li>
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
                      <h3 class="card-title">Add User</h3>
                      <a href="{{route('users.index')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i>  All User</a>
                      
                      </div><!-- /.card-header -->
                      <!-- @if(session()->has('success'))
                      
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ session()->get('success')}}</strong>
                      </div>
                      
                      
                      @endif  -->
                      <div class="card-body">
                        <div class="col-md-6 offset-md-3">
                          <form action="{{route('store.user')}}" id="myform" method="post">
                            @csrf
                            <div class="form-group">
                              <label>Role</label>
                              <select name="role" class="form-control @error('role') is-invalid @enderror">
                                <option value="">--Select User Role--</option>
                                <option value="Admin">Admin</option>
                                <option value="Editor">Editor</option>
                              </select>
                              @error('role')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" >
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" >
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" >
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label>Conform password</label>
                              <input type="password" name="cpassword" id="cpassword" class="form-control @error('cpassword') is-invalid @enderror" >
                              @error('cpassword')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
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
            role: {
            required: true,
            
            },
            name: {
            required: true,
            
            },
            email: {
            required: true,
            email: true,
            },
            password: {
            required: true,
            minlength: 8
            },
            cpassword: {
            required: true,
            equalTo: '#password'
            },
            
            },
            messages: {
            role: {
            required: " user type is required",
            
            },
            name: {
            required: "name is required",
            
            },
            email: {
            required: "Please enter a email address",
            email: "Please enter a valid email address"
            },
            password: {
            required: "password is required",
            minlength: "Your password must be at least 8 characters long"
            },
            cpassword: {
            required: "conform password is required",
            minlength: "password and conform password does not match!"
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