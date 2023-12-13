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
              <li class="breadcrumb-item active">Add Purchase</li>
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
                    <h3 class="card-title">Add Purchase</h3>
                    <a href="{{route('purchase.index')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i>  All Purchase</a>
                    
                  </div>
                </div>
                
                <div class="form-group col-md-4">
                  <label>Purchase No</label>
                  <input type="text" id="purchase_no_id" name="purchase_no_id" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label>Purchase Date</label>
                  <input type="text" id="purchase_date" name="purchase_date" class="form-control datepicker" readonly placeholder="yyyy-mm-dd">
                </div>
                <div class="form-group col-md-4">
                  <label>Supplier Name</label>
                  <select name="supplier_id" id="supplier_id" class="form-control select2">
                    <option value="">Select Supplier</option>
                    @foreach($suppliers as $supplier)
                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                    @endforeach
                  </select>
                </div>
                
                <div class="form-group col-md-4">
                  <label> Category</label>
                  <select name="category_id" id="category_id" class="form-control select2">
                    <option value="">Select Category</option>
                   
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Product name</label>
                <select name="product_id" id="product_id" class="form-control select2" >
                    <option value="">Select Product</option>
                   
                  </select>
                  
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
            <form method="post" action="{{route('purchase.store')}}" id="myform">
              @csrf

              <table class="table-sm table-bordered" width="100%">
                <thead>
                <tr>
                  <th>Category</th>
                  <th>Product Name</th>
                  <th width="7%">Pcs/Kg</th>
                  <th width="10%">Unit Price</th>
                  <th>Description</th>
                  <th width="10%">Total Price</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody class="addRow" id="addRow">
                  
                </tbody>
                <tbody>
                  <tr>
                    <td colspan="5"></td>
                    <td>
                      <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: #D8FDBA">
                    </td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary" id="storeButton">Purchase Store</button>
              </div>
            </form>
          </div>
        </div>


        <!--Dependent Category Code Here -->

        <script type="text/javascript">
          
          $(function(){

            $(document).on('change','#supplier_id',function(){

              var supplier_id = $(this).val();
              $.ajax({

                url:"{{route('get-category')}}",
                type:"GET",
                data:{supplier_id:supplier_id},
                success:function(data){

                  var html ='<option value="">Select Category</option>';
                  $.each(data,function(key,v){

                    html +='<option value="'+v.category_id+'">'+v.category.name+'</option>';

                  });

                  $('#category_id').html(html);
                }

              });

            });

          });
        </script>

          <script type="text/javascript">
          
          $(function(){

            $(document).on('change','#category_id',function(){

              var category_id = $(this).val();
              $.ajax({

                url:"{{route('get-product')}}",
                type:"GET",
                data:{category_id:category_id},
                success:function(data){

                  var html ='<option value="">Select Product</option>';
                  $.each(data,function(key,v){

                    html +='<option value="'+v.id+'">'+v.name+'</option>';

                  });

                  $('#product_id').html(html);
                }

              });

            });

          });
        </script>

        
        <!----Purchase Script--->
      <script type="text/x-handlebars-template" id="document-template">
        
       <tr class="delete_add_more_item" id="delete_add_more_item">
          <input type="hidden" name="purchase_date[]" value="@{{purchase_date}}">
          <input type="hidden" name="purchase_no_id[]" value="@{{purchase_no_id}}">
          <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">
          <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{category_name}}
          </td>
          <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{product_name}}
          </td>
          <td>
            <input type="number" min="1" class="form-control form-control-sm text-right buying_qty" name="buying_qty[]" value="1">
           
          </td>
           <td>
            <input type="number" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
            
          </td>
          <td>
            <input type="text" class="form-control form-control-sm " name="description[]">
           
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

            var purchase_date = $('#purchase_date').val();
            var purchase_no_id = $('#purchase_no_id').val();
            var supplier_id = $('#supplier_id').val();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();

             if(purchase_no_id==''){

              $.notify("Purchase No is required", {globalPosition:'top right',className:'error'});
              return false;
            }

            if(purchase_date==''){

              $.notify("Purchase Date is required", {globalPosition:'top right',className:'error'});
              return false;
            }

              if(category_id==''){

              $.notify("Category is required", {globalPosition:'top right',className:'error'});
              return false;
            }
             if(product_id==''){

              $.notify("Product is required", {globalPosition:'top right',className:'error'});
              return false;
            }

            var source = $('#document-template').html();
            var template = Handlebars.compile(source);
            var data = 
            {
              purchase_no_id:purchase_no_id,
              purchase_date:purchase_date,
              supplier_id: supplier_id,
              category_id:category_id,
              category_name:category_name,
              product_id:product_id,
              product_name:product_name

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
        @push('script')

      <!--Validation Javascript-->
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