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
              <li class="breadcrumb-item active">Add Challan</li>
            </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              
              <div class="row">
                <div class="card col-md-12">
                  <div class="card-header">
                    <h3 class="card-title">Add Challan</h3>
                    <a href="{{route('challan.index')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i>  All Challan</a>
                    
                  </div>
                </div>
                
                <div class="form-group col-md-4">
                  <label>Challan No</label>
                  <input type="text" id="challan_no" name="challan_no" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label>Challan Date</label>
                  <input type="text" id="challan_date" name="challan_date" class="form-control datepicker" readonly placeholder="yyyy-mm-dd">
                </div>
               <div class="form-group col-md-4">
                    <label>Product Name</label>
                    <select name="product" class="form-control @error('product') is-invalid @enderror" id="product_id">
                      <option value="">--Select Product--</option>
                      @foreach($products as $product)
                      <option value="{{$product->id}}">{{$product->name}}</option>
                      @endforeach
                    </select>
                    @error('product')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                
              <div class="form-group col-md-4">
                    <label>Category</label>
                    <select name="category" class="form-control @error('category') is-invalid @enderror" id="category_id">
                      <option value="">--Select category--</option>
                      @foreach($category as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                    @error('category')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
               
                <div class="form-group" style="padding-top: 32px">
                  <a class="btn btn-primary float-right btn-sm" id="add_item"><i class="fa fa-plus-circle"></i> Add Item</a>
               </div>
              <!-- /.card -->
            </div>
          </div>
            <!-- /.card -->
          </section>
          <!-- right col -->

          <div class="card-body">
            <form method="post" action="{{route('challan.store')}}" id="myform">
              @csrf

              <table class="table-sm table-bordered" width="100%">
                <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Category</th>
                  <th width="7%">Pcs/Kg</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody class="addRow" id="addRow">
                  
                </tbody>
              
              </table>
              <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary" id="storeButton">Challan Store</button>
              </div>
            </form>
          </div>
        </div>


     
        
        <!----Purchase Script--->
      <script type="text/x-handlebars-template" id="document-template">
        
       <tr class="delete_add_more_item" id="delete_add_more_item">
          <input type="hidden" name="challan_date[]" value="@{{challan_date}}">
          <input type="hidden" name="challan_no[]" value="@{{challan_no}}">

           <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{product_name}}
          </td>
          <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{category_name}}
          </td>
         
          <td>
            <input type="number" min="1" class="form-control form-control-sm text-right buying_qty" name="buying_qty[]" value="1">
           
          </td>
         

          <td><i class="btn btn-danger btn-sm fa fa-window-close removeEvent"></i></td>

        </tr>

      </script>

     <script >
        $(document).ready(function(){

          $(document).on('click','#add_item',function(){

            var challan_date = $('#challan_date').val();
            var challan_no = $('#challan_no').val();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();

             if(challan_no==''){

              $.notify("Challan No is required", {globalPosition:'top right',className:'error'});
              return false;
            }

            if(challan_date==''){

              $.notify("Challan Date is required", {globalPosition:'top right',className:'error'});
              return false;
            }

            if(product_id==''){

              $.notify("Product is required", {globalPosition:'top right',className:'error'});
              return false;
            }

              if(category_id==''){

              $.notify("Category is required", {globalPosition:'top right',className:'error'});
              return false;
            }
             

            var source = $('#document-template').html();
            var template = Handlebars.compile(source);
            var data = 
            {
              challan_no:challan_no,
              challan_date:challan_date,
              product_id:product_id,
              product_name:product_name,
              category_id:category_id,
              category_name:category_name,
              

            };
            var html = template(data);
            $('#addRow').append(html);


          });





          $(document).on('click','.removeEvent', function(event){

            $(this).closest('.delete_add_more_item').remove();
            

          });

        

      //calculation Total ammount



        });


      </script>


        <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd',
        });
      </script>

        @endsection
    