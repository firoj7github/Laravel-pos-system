@extends('layouts.app')
@section('content')
<<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit product</li>
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
                      <h3 class="card-title">Edit product</h3>
                      <a href="{{route('product.index')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i>  All product</a>
                      
                      </div><!-- /.card-header -->
                       <!-- @if(session()->has('success'))
                     
                         <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ session()->get('success')}}</strong>
                          </div>
                      
                      
                      @endif  -->
                      <div class="card-body">
                        <div class="col-md-6 offset-md-3">
                         <form action="{{route('product.update',$editData->id)}}" id="myform" method="post">
                          @csrf                         

                            <div class="form-group">
                            <label> Supplier Name</label>
                           <select name="supplier_id" class="form-control">
                             <option value="">Select Supplier</option>
                             @foreach($suppliers as $supplier)
                             <option value="{{$supplier->id}}"{{($editData->supplier_id==$supplier->id)?'Selected': ''}}>{{$supplier->name}}</option>
                             @endforeach
                           </select>
                          </div>

                         <div class="form-group">
                           <label> Unit</label>
                           <select name="unit_id" class="form-control">
                             <option value="">select Unit</option>
                             @foreach($units as $unit)
                             <option value="{{$unit->id}}" {{($editData->unit_id==$unit->id)?'selected':''}}>{{$unit->name}}</option>
                             @endforeach
                           </select>
                          </div>
                          <div class="form-group">
                           <label> Category</label>
                           <select name="category_id" class="form-control">
                             <option value="">select Category</option>
                             @foreach($category as $category)
                             <option value="{{$category->id}}" {{($editData->category_id==$category->id)?'selected':''}}>{{$category->name}}</option>
                             @endforeach
                           </select>
                          </div>

                           <div class="form-group">
                           <label>Product name</label>
                            <input type="text" id="address" name="name" class="form-control" value="{{$editData->name}}">
                           
                          </div>
                          <button type="submit" class="btn btn-primary">Update Product</button>
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
      mobile: {
        required: true,
        
      },
      email: {
        required: true,
        email: true,
      },
      address: {
        required: true,
      },
       
    },
    messages: {
     
      name: {
        required: "name is required",
       
      }, 
      mobile: {
        required: "mobile is required",
       
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      address: {
        required: "address is required",
        
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
