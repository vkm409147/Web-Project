<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Products</title>
</head>
<body>
   <div class="container mt-3" style="margin-top: 20px">
    <h2>Product List</h2>
    <div style="margin-right: 10%; margin-bottom:20px; float: right;">
        <a href="{{ url('product-add') }}" class="btn btn-primary">Add product</a>
    </div>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Details</th>
                <th>Image</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $pro)
            <tr>
                <td>{{ $pro->productID }}</td>
                <td>{{ $pro->productName }}</td>
                <td>{{ number_format($pro->productPrice) }}</td>
                <td>{{ $pro->productDetails }}</td>
                <td>
                    <img src="{{ asset('pro_img/' . $pro->productImage) }}" alt="Product Image"
                         height="120px" width="120px">
                </td>
                <td>{{ $pro->catID }}</td>
                <td>
                    <a href="#" title="Edit this product"><i class="bi bi-pencil-fill"></i></a> &nbsp;
                    <a href="{{ url('product-delete/' . $pro->productID) }}" title="Delete this product"
                        onclick="return confirm('Are you sure you want to delete this product?');"><i
                            class="bi bi-x-square"></i></a> &nbsp;
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>