@extends('layouts.app')
@section('content')
<<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Bill</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Bill</li>
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
                      <h3 class="card-title"> Bill List</h3>
                      <a href="{{route('bill.add')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i>  add Bill</a>
                      
                      </div><!-- /.card-header -->
                      <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">

                          <thead>
                            <tr>
                              <th>SL.</th>
                              <th>Bill No</th>
                              <th>Product Name</th>
                              <th>Category</th>
                              <th>Bill Date</th>
                              <th>Quantity</th>
                              <th>Unit Price</th>
                              <th>Buying Price</th>                 
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach($alldata as $key => $bill)
                            <tr>
                              <td>{{$key+1}}</td>                  
                              <td>{{$bill->purchase_no}}</td>
                              <td>{{$bill['product']['name']}}</td> 
                              <td>{{$bill['category']['name']}}</td>
                              <td>{{$bill->date}}</td>
                              <td>
                                {{$bill->quantity}}
                                {{$bill['product']['unit']['name']}}
                              </td>                        
                              <td>{{$bill->unit_price}}</td>    
                              <td>{{$bill->buying_price}}</td>    
                              <td>
                               <a href="{{route('bill.delete',$bill->id)}}" class="btn btn-danger" id="deleteID"><i class="fa fa-trash"></i></a>
                               
                                <a href="{{route('bill.print',$bill->id)}}" class="btn btn-success" id="bill_pdf" target="_blank"><i class="fa fa-print"></i></a>
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
