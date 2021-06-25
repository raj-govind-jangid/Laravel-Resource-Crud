@extends('base')

@section('title')
    <title>Vendor</title>
@endsection

@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="card p-3 shadow rounded">
            <a href="{{ route('product.create')}}" class="btn mb-0 ml-auto">Add Product</a>
            <br>
            <table class="table text-center">
                <thead>
                    <tr style="background-color: #6f42c1; color: #fff;">
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Created At</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><img style="width: 50px; height: 50px;"
                                    src="{{ asset('/productimages') }}/{{ $product->image }}"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->size }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td><a href="{{ route('product.edit', $product->id) }}"><img src="https://img.icons8.com/android/24/000000/edit.png"/></a></td>
                            <td>
                                <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" id="completed-task" class="fabutton">
                                        <img src="https://img.icons8.com/metro/24/000000/delete-sign.png"/>
                                  </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $products->links() !!}
            </div>  
        </div>
    </div>
@endsection
