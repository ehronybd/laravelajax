<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    </head>
  <body>


  <div class="container">
  <div class="row">
  <h2 class="my-3 text-center">Laravel 9 Ajex Crud Operation</h2>
  
  <div class="col-md-2"></div>
  <div class="col-md-8">
  
  <a href="" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#addeModal">Add Product</a>
  </br>
  <input type="text" name="search" id="search" class="search mb-3" placeholder="Search Here">
  
 <div class="table-data">
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($products as $key=>$product)
    <tr>
      <th>{{$key+1}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->price}}</td>
      <td>
      <a href=""
      class="btn btn-success update_product_form"
      data-bs-toggle="modal"
      data-bs-target="#updateModal"
        data-id="{{$product->id}}"
        data-name="{{$product->name}}"
        data-price="{{$product->price}}">

      <i class="las la-edit"></i></a>
      
      <a href="" class="btn btn-danger delete_product"
      data-id="{{$product->id}}">
      <i class="las la-times"></i></a>
      </td>
    </tr>
 @endforeach
  </tbody>
  
</table>
{!! $products->links() !!}

 </div>
</div>
</div>
</div>


@include ('add_product')
@include ('update_product')
@include ('script_js')
{!! Toastr::message() !!}
    </body>
</html>
