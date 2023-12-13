@extends('layouts.app')
@section('content')
<<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Quotation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quotation</li>
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
                      <h3 class="card-title"> Quotation List</h3>
                      <a href="{{route('quotation.add')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i>  add Quotation</a>
                      
                      </div><!-- /.card-header -->
                      <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">

                          <thead>
                            <tr>
                              <th>SL.</th>
                              <th>Quotation No</th>
                              <th>Product</th>
                              <th>Category</th>
                              <th>Unit</th>                           
                              <th>Unit price</th>   
                              <th>Buying price</th>  
                              <th>Date</th>                        
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach($allData as $key => $quotation)
                            <tr>
                              <td>{{$key+1}}</td>    
                              <td>{{$quotation->quotation_no}}</td>
                              <td>{{$quotation['product']['name']}}</td>
                              <td>{{$quotation['category']['name']}}</td>
                              <td>
                                {{$quotation->unit_id}}
                                {{$quotation['product']['unit']['name']}}

                              </td>
                              <td>{{$quotation->unit_price}}</td>
                              <td>{{$quotation->buying_price}}</td>
                              <td>{{$quotation->date}}</td>
                              <td>
                                <a href="{{route('quotation.edit',$quotation->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                               <a href="{{route('quotation.delete',$quotation->id)}}" class="btn btn-danger" id="deleteID"><i class="fa fa-trash"></i></a>
                               <a href="{{route('quotaion.print',$quotation->id)}}" class="btn btn-info" target="_blank"><i class="fa fa-print"></i></a>


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
