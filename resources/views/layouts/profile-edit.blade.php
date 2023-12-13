@extends('layouts.app')
@section('content')
<<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile edit</li>
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
                      <h3 class="card-title">Edit Profile</h3>
                      <a href="{{route('profile.index')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-user"></i>  Your Profile</a>
                      
                      </div><!-- /.card-header -->
                       <!-- @if(session()->has('success'))
                     
                         <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ session()->get('success')}}</strong>
                          </div>
                      
                      
                      @endif  -->
                      <div class="card-body">
                        <div class="col-md-6 offset-md-3">
                         <form action="{{route('profile.update')}}"method="post" enctype="multipart/form-data">
                          @csrf
                        
                            <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{$edit_user->name}}" class="form-control @error('name') is-invalid @enderror" >
                            @error('name')
                            <span class="invalid-feedback" role="alert"> 
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" value="{{$edit_user->address}}" class="form-control @error('address') is-invalid @enderror" >
                            @error('address')
                            <span class="invalid-feedback" role="alert"> 
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" value="{{$edit_user->mobile}}" class="form-control @error('mobile') is-invalid @enderror" >
                            @error('mobile')
                            <span class="invalid-feedback" role="alert"> 
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                          </div>
                          <div class="form-group">
                           <label>Email</label>
                            <input type="email" name="email" value="{{$edit_user->email}}" class="form-control @error('email') is-invalid @enderror" >
                            @error('email')
                           <span class="invalid-feedback" role="alert"> 
                            <strong>{{ $message }}</strong>
                           </span>
                          @enderror
                          </div>

                            <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                              <option value="">--Select Gender--</option>
                              <option value="Male"{{($edit_user->gender == "Male")?"Selected":""}}>Male</option>
                              <option value="Female" {{($edit_user->gender == "Female")?"Selected":""}}>Female</option>
                              <option value="Other" {{($edit_user->gender == "Others")?"Selected":""}}>Others</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                          </div>

                          <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" style="cursor: pointer;">
                          </div>

                          <div class="form-group">
                            <img src="{{(!empty($edit_user->image))?asset('public/user_images/upload_img/'.$edit_user->image):asset('public/user_images/no_image.png')}}" style="width: 150px; height: 160px;border: 1px solid #000" id="showImage">
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
 

<script type="text/javascript">
  $(document).ready(function(){

    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload =function(e){

        $('#showImage').attr('src',e.target.result);
      }

      reader.readAsDataURL(e.target.files['0']);
    });

  });
</script>
   
@endpush
