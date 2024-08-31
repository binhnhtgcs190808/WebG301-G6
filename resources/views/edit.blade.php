<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Edit product</title>
</head>
<body>
    <div class="container mt-3">
        <h2>Update product</h2>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
        <form action="{{url('update')}}" method="POST">
            @csrf
          <div class="mb-3 mt-3">
            <label for="id">Product ID:</label>
            <input type="text" class="form-control" id="id" readonly
                   value = "{{$data->productID}}" name = id>
          </div>
          <div class="mb-3 mt-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" 
                    value = "{{$data->productName}}" name="name">
          </div>
          <div class="mb-3 mt-3">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" 
                    value = "{{$data->productPrice}}" name="price">
          </div>
          <div class="mb-3 mt-3">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image">
            <input type="text" class="form-control" id="old_image" name="old_image"
                    value = "{{$data->productImage}}">
          </div>
          <div class="mb-3 mt-3">
            <label for="details">Details:</label>
            <textarea class="form-control" rows="5" id="details" name="details">
                {{$data->productDetails}}
            </textarea>
          </div>
          <div class="mb-3 mt-3">
            <label for="category">Category:</label>
            <select name="category" id="category" class="form-control">
                @foreach ($category as $cat)
                <option value="{{$cat->catID}}"
                    {{$cat->catID == $data->catID ? 'selected' : ''}}>
                {{$cat->catName}}
                </option>
                @endforeach                
            </select>
          </div>
          <button type="update" class="btn btn-primary">Update</button>
          <a href="{{url('admin/products')}}" class="btn btn-danger"> Back </a>
        </form>
      </div>
</body>
</html>