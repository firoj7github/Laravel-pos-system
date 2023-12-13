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
              <li class="breadcrumb-item active">Edit Quotation</li>
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
                      <h3 class="card-title">Edit Quotation</h3>
                      <a href="{{route('quotation.index')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i>  All Quotation</a>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <form action="{{route('quotation.update',$editData->id)}}" id="myform" method="post">
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
                    <label>description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{$editData->description}}</textarea>
                    
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <label>Quotation Date</label>
                   <input type="date" id="quotation_date" name="quotation_date" class="form-control" placeholder="yyyy-mm-dd" value="{{$editData->date}}">                    
                    @error('quotation_date')
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
                    <label>Unit</label>
                    <select name="unit" class="form-control @error('unit') is-invalid @enderror">
                      <option value="">--Select unit--</option>
                      @foreach($units as $unit)
                      <option value="{{$unit->id}}" {{($editData->unit_id==$unit->id)?'Selected':''}}>{{$unit->name}}</option>
                      @endforeach
                    </select>
                    @error('unit')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <label>Unit Price</label>
                    <input type="number" name="unit_price" class="form-control @error('unit_price') is-invalid @enderror" value="{{$editData->unit_price}}">
                    @error('unit_price')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <label>Buying Price</label>
                    <input type="number" name="buying_price" class="form-control @error('buying_price') is-invalid @enderror"  value="{{$editData->buying_price}}">
                    @error('buying_price')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  
                  <div class="form-group col-md-2" style="padding-top: 33px">
                  <button type="submit" class="btn btn-primary ">Update Quotation</button>
                  </div>
                  
                </div>
                
                
              </div>
            </form>
          </section>
          
        </div>
        
        <!--Validation Javascript-->
        
        @endsection

       