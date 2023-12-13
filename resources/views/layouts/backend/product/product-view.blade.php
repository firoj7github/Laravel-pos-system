@extends('layouts.app')
@section('content')
<<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Suppliers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>


             
         <!--    @if(session()->has('success'))           
               <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>{{ session()->get('success')}}</strong>
                </div>
            @endif  --> 
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
                      <h3 class="card-title"> Product List</h3>
                      <a href="{{route('product.add')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i>  add Product</a>
                      
                      </div><!-- /.card-header -->
                      <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">

                          <thead>
                            <tr>
                              <th>SL.</th>
                              <th>Supplier</th>
                              <th>Unit</th>
                              <th>Category</th>
                              <th>Name</th>                       
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach($alldata as $key => $product)
                            <tr>
                              <td>{{$key+1}}</td>                          
                              <td>{{$product['supplier']['name']}}</td>
                               <td>{{$product['unit']['name']}}</td>
                              <td>{{$product['category']['name']}}</td>
                              <td>{{$product->name}}</td> 
                              @php
                                $count_product = App\Models\Purchase::where('product_id',$product->id)->count();
                              @endphp                       
                              <td>
                                <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                              @if($count_product < 1)
                               <a href="{{route('product.delete',$product->id)}}" class="btn btn-danger" id="deleteID"><i class="fa fa-trash"></i></a>

                               @endif
                              </td>
                            </tr>

                            @endforeach
                          </tbody>
                        </table>
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
            
@endsection
