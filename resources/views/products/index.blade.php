<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Laravel 9 CRUD Tutorial Example</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Laravel 9 CRUD Example Tutorial</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('products.create') }}"> Add Products</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th>
<th>Product Name</th>
<th>Product Base Price</th>
<th>Product Selling Price</th>
<th width="280px">Action</th>
</tr>
@foreach ($products as $company)
<tr>
<td>{{ $products->products_id }}</td>
<td>{{ $products->products_name }}</td>
<td>{{ $products->products_base_price }}</td>
<td>{{ $products->products_selling_price }}</td>
<td>
<!-- <form action="{{ route('companies.destroy',$company->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form> -->
</td>
</tr>
@endforeach
</table>
{!! $products->links() !!}
</body>
</html>