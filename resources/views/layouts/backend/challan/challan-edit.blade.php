@extends('layouts.app')
@section('content')
<<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Challan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Challan</li>
            </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
          <!-- Main content -->
          <section>
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Edit Challan</h3>
                      <a href="{{route('challan.index')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i>  All Challan</a>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <form action="{{route('challan.update',$editData->id)}}" id="myform" method="post">
               @csrf  
              <div class="container">
                <div class="row">
                 <div class="form-group col-md-4">
                    <label>Product</label>
                    <select name="product" class="form-control @error('product') is-invalid @enderror">
                      <option value="">--Select Product--</option>
                      @foreach($products as $product)
                      <option value="{{$product->id}}" {{($editData->product_id== $product->id)?'Selected':''}}>{{$product->name}}</option>
                      @endforeach
                    </select>
                    @error('product')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <label>Challan Date</label>
                   <input type="date" id="challan_date" name="challan_date" class="form-control" placeholder="yyyy-mm-dd" value="{{$editData->date}}">                    
                    @error('challan_date')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <label>category</label>
                    <select name="category" class="form-control @error('category') is-invalid @enderror">
                      <option value="">--Select category--</option>
                      @foreach($category as $category)
                      <option value="{{$category->id}}" {{($editData->category_id==$category->id)?'Selected':''}}>{{$category->name}}</option>
                      @endforeach
                    </select>
                    @error('category')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <label>Quantity</label>
                     <input type="text"  name="unit" class="form-control" value="{{$editData->unit_id}}">
                    @error('unit')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-2" style="padding-top: 33px">
                  <button type="submit" class="btn btn-primary ">Update Challan</button>
                  </div>
                  
                </div>
                
                
              </div>
            </form>
          </section>
          
        </div>
        
        <!--Validation Javascript-->
        
        @endsection

       