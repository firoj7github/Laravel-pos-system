@extends('layouts.app')
@section('content')
<<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Type</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Type</li>
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
                      <h3 class="card-title">Edit Type</h3>
                      <a href="{{route('category.index')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i>  All Type</a>
                      
                      </div><!-- /.card-header -->
                       <!-- @if(session()->has('success'))
                     
                         <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ session()->get('success')}}</strong>
                          </div>
                      
                      
                      @endif  -->
                      <div class="card-body">
                        <div class="col-md-6 offset-md-3">
                         <form action="{{route('category.update',$editData->id)}}" id="myform" method="post">
                          @csrf                         

                            <div class="form-group">
                            <label>Type Name</label>
                            <input type="text" name="name" value="{{$editData->name}}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert"> 
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                          </div>
                         
                          <button type="submit" class="btn btn-primary">Update Type</button>
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
      name: {
        required: true,
        
      }, 
     
       
    },
    messages: {
     
      name: {
        required: "name is required",
       
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
