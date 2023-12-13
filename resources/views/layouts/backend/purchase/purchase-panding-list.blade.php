@extends('layouts.app')
@section('content')
<<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Purchase</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase</li>
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
                      <h3 class="card-title"> Purchase Pending List</h3>
                      <!-- <a href="{{route('purchase.add')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i>  add Purchase</a> -->
                      
                      </div><!-- /.card-header -->
                      <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">

                          <thead>
                            <tr>
                              <th>SL.</th>
                              <th>Purchase No</th>
                              <th>Category</th>
                              <th>Supplier Name</th>
                              <th>Product Name</th>
                              <th>Purchase Date</th>
                              <th>Description</th>
                              <th>Quantity</th>                       
                              <th>Unit Price</th>                       
                              <th>Buying Price</th>
                              <th>Status</th>                      
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach($alldata as $key => $purchase)
                            <tr>
                              <td>{{$key+1}}</td>                      
                              <td>{{$purchase->purchase_no}}</td>
                              <td>{{$purchase['category']['name']}}</td>
                              <td>{{$purchase['supplier']['name']}}</td>
                              <td>{{$purchase['product']['name']}}</td> 
                              <td>{{$purchase->date}}</td>
                              <td>{{$purchase->description}}</td>
                              <td>
                                {{$purchase->quantity}}
                                {{$purchase['product']['unit']['name']}}
                              </td>                        
                              <td>{{$purchase->unit_price}}</td>              
                              <td>{{$purchase->buying_price}}</td>    
                              <td>
                                @if($purchase->status=='0')
                                <span style="color: #fff;background-color: red;">Pending</span>
                                @elseif($purchase->status=='1')
                                <span style="color: white;background: green">Approved</span>
                                @endif
                              </td>                 
                              <td width="10%">
                              @if($purchase->status=='0')                          
                               <a href="{{route('purchase.approve',$purchase->id)}}" title="Approved" class="btn btn-success" id="ApprovedBtn"><i class="fa fa-check-circle"></i></a>

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
