@extends('backend.layout.master')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New Products</h4>
        
        <form class="forms-sample" method="POST" action="{{ route('update.product', $product->id) }}" enctype="multipart/form-data">
          @csrf
          @if ($errors->any())
              <div class="alert alert-danger" id="alDanger">
                <button type="button" onclick="myCloseFunction()" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          {{ $product }}
          <div class="form-group">
            <label for="exampleInputName1">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $product->title }}" id="exampleInputName1" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Description</label>
            <textarea type="text" class="form-control" name="description"  id="exampleInputEmail3" placeholder="Description">{{ $product->description }}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Quantity</label>
            <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}" id="exampleInputEmail3" placeholder="Quantity">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Price</label>
            <input type="text" class="form-control" name="price" value="{{ $product->price }}" id="exampleInputEmail3" placeholder="Price">
          </div>
          
          
          
          <input type="file" name="product_image[]" class="file-upload-default" placeholder="select image">
          <input type="file" name="product_image[]" class="file-upload-default" placeholder="select image">
          <input type="file" name="product_image[]" class="file-upload-default" placeholder="select image">

          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>


@endsection
    
