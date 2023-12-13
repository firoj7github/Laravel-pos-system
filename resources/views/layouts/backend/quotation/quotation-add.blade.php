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
              <li class="breadcrumb-item active">Add Quotation</li>
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
                    <h3 class="card-title">Add Quotation</h3>
                    <a href="{{route('quotation.index')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i>  All Quotation</a>
                    
                  </div>
                </div>
                
                <div class="form-group col-md-4">
                  <label>Quotation No</label>
                  <input type="text" id="quotation_no" name="quotation_no" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label>Quotation Date</label>
                  <input type="text" id="quotation_date" name="quotation_date" class="form-control datepicker" readonly placeholder="yyyy-mm-dd">
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
            <form method="post" action="{{route('quotation.store')}}" id="myform">
              @csrf

              <table class="table-sm table-bordered" width="100%">
                <thead>
                <tr>
                  
                  <th>Product Name</th>
                  <th>Category</th>
                  <th width="7%">Pcs/Kg</th>
                  <th width="10%">Unit Price</th>
                  <th width="10%">Total Price</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody class="addRow" id="addRow">
                  
                </tbody>
                <tbody>
                  <tr>
                    <td colspan="4"></td>
                    <td>
                      <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: #D8FDBA">
                    </td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary" id="storeButton">Quotation Store</button>
              </div>
            </form>
          </div>
        </div>


     
        
        <!----Purchase Script--->
      <script type="text/x-handlebars-template" id="document-template">
        
       <tr class="delete_add_more_item" id="delete_add_more_item">
          <input type="hidden" name="quotation_date[]" value="@{{quotation_date}}">
          <input type="hidden" name="quotation_no[]" value="@{{quotation_no}}">

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
           <td>
            <input type="number" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
            
          </td>
         
          <td>
            <input type="text" class="form-control form-control-sm text-right buying_price" name="buying_price[]" value="0" readonly>
          
          </td>

          <td><i class="btn btn-danger btn-sm fa fa-window-close removeEvent"></i></td>

        </tr>

      </script>

     <script >
        $(document).ready(function(){

          $(document).on('click','#add_item',function(){

            var quotation_date = $('#quotation_date').val();
            var quotation_no = $('#quotation_no').val();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();

             if(quotation_no==''){

              $.notify("Quotation No is required", {globalPosition:'top right',className:'error'});
              return false;
            }

            if(quotation_date==''){

              $.notify("Quotation Date is required", {globalPosition:'top right',className:'error'});
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
              quotation_no:quotation_no,
              quotation_date:quotation_date,
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
            totalAmountPrice();

          });

          $(document).on('keyup click','.unit_price,.buying_qty', function(){

            var unit_price = $(this).closest('tr').find('input.unit_price').val();
            var buying_qty = $(this).closest('tr').find('input.buying_qty').val();
            var total = unit_price * buying_qty;

            $(this).closest('tr').find('input.buying_price').val(total);

            totalAmmounPrice();
          });

      //calculation Total ammount

          function totalAmmounPrice(){

            var sum = 0;
            $('.buying_price').each(function(){

              var value = $(this).val();

              if(!isNaN(value) && value.length !=0){

                sum +=parseFloat(value);
              }

            });

            $('#estimated_amount').val(sum);
          }


        });


      </script>


        <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd',
        });
      </script>

        @endsection
    