@extends('base')

@section('title')
    <title>Edit Product</title>
@endsection

@section('content')
    <div class="container" style="margin-top: 50px;">
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <ul>
          @foreach ($errors->all() as $message)
            <li><strong>{{$message}}</strong></li>
          @endforeach
          </ul>
        </div>
        @endif
        <div class="card p-3 shadow rounded">
            <h1 class="mx-auto" style="color: #6f42c1;">Edit Product</h1>
            <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Name:</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label>Product Description:</label>
                        <textarea class="form-control" rows="4" name="description">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Product Context:</label>
                        <textarea class="form-control" rows="4" name="content">{{$product->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Product Image:</label>
                        <input type="file" class="form-control" name="image" placeholder="Upload Product Image" onchange="previewFile(this)">
                        <img id="previewImg" alt="profile image" style="max-width: 130px; margin-top: 20px;" src="{{asset('productimages')}}/{{$product->image}}">
                    </div>
                    <div class="form-group">
                        <label>Quantity:</label>
                        <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Size:</label>
                        <input type="number" class="form-control" name="size" value="{{$product->size}}">
                    </div>
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="number" class="form-control" name="price" value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label>Price Sale:</label>
                        <input type="number" class="form-control" name="saleprice" value="{{$product->saleprice}}">
                    </div>
                    <div class="form-group">
                        <label>Wide:</label>
                        <input type="number" class="form-control" name="wide" value="{{$product->wide}}">
                    </div>
                    <div class="form-group">
                        <label>Length:</label>
                        <input type="number" class="form-control" name="length" value="{{$product->length}}">
                    </div>
                    <div class="form-group">
                        <label>Weight:</label>
                        <input type="number" class="form-control" name="weight" value="{{$product->weight}}">
                    </div>
                    <div class="form-group">
                        <label>Height:</label>
                        <input type="number" class="form-control" name="height" value="{{$product->height}}">
                    </div>
                    <button type="submit" class="btn">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <br>
    <br>
<script>
     function previewFile(input){
        var file=$("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $('#previewImg').attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
