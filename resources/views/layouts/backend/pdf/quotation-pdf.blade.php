<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Tempusdominus Bootstrap 4 -->
		<link rel="stylesheet" href="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
		<title>Quotation PDF</title>
	</head>
	<body>
		<div class="card-body">
			<h3 style="text-align: center;"><u>Quotation</u></h3>
			<table width="100%">
				<tr>
					<td>To</td>	
				</tr>
				<tr>
					<td>SGS Bangladesh Limited</td>	
				</tr>
				<tr>
					<td>6th-9th Floors,Noor Tower</td>
				</tr>
				<tr>
					<td>110,Bir Uttam C.R Datta Road</td>
				</tr>
				<tr>
					<td>Dhaka-1205, Bangladesh</td>
				</tr>
				<tr>
					<td><strong>Quotation NO:</strong> {{$alldata->quotation_no}}</td>
					<td align="right"><strong>Quotation Date:</strong> {{$alldata->date}}</td>
				</tr>
				
					
				
			</table>
			<br/>
			
			
			<table width="100%" border="0.5">
				<thead>
					<tr>
						
						
						<th height="30">SL No.</th>
						<th>Product Name</th>
						<th>Category</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th>Price</th>
						
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<td height="250" align="center">{{01}}</td>
						<td align="center">{{$alldata['product']['name']}}</td>
						<td align="center">{{$alldata['category']['name']}}</td>
					
						<td align="center">
							{{$alldata->unit_id}}
							{{$alldata['product']['unit']['name']}}
						</td>
						<td align="center">{{$alldata->unit_price}}</td>
						<td align="center">{{$alldata->buying_price}}</td>
						
					</tr>
					
				</tbody>
			</table>
		</div>
	</div>
	
</body>


</html>