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
              <li class="breadcrumb-item active">Suppliers</li>
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
                      <h3 class="card-title"> Suppliers List</h3>
                      <a href="{{route('suppliers.add')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i>  add suppliers</a>
                      
                      </div><!-- /.card-header -->
                      <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">

                          <thead>
                            <tr>
                              <th>SL.</th>
                              <th>Name</th>
                              <th>Mobile</th>
                              <th>Email</th>
                              <th>Address</th>                              
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach($allData as $key => $suppliers)
                            <tr>
                              <td>{{$key+1}}</td>                          
                              <td>{{$suppliers->name}}</td>
                               <td>{{$suppliers->mobile}}</td>
                              <td>{{$suppliers->email}}</td>
                              <td>{{$suppliers->address}}</td>
                              @php
                                $count_supplier = App\Models\Product::where('supplier_id',$suppliers->id)->count();
                              @endphp
                              
                              <td>
                                <a href="{{route('suppliers.edit',$suppliers->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                              @if($count_supplier <1)
                               <a href="{{route('suppliers.delete',$suppliers->id)}}" class="btn btn-danger" id="deleteID"><i class="fa fa-trash"></i></a>

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
