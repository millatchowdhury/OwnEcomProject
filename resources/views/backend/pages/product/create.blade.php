@extends('backend.layout.master')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New Products</h4>
        
        <form class="forms-sample" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
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
          <div class="form-group">
            <label for="exampleInputName1">Title</label>
            <input type="text" class="form-control" name="title" id="exampleInputName1" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Description</label>
            <textarea type="text" class="form-control" name="description" id="exampleInputEmail3" placeholder="Description"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Quantity</label>
            <input type="text" class="form-control" name="quantity" id="exampleInputEmail3" placeholder="Quantity">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Price</label>
            <input type="text" class="form-control" name="price" id="exampleInputEmail3" placeholder="Price">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Select A Category</label>
            <select name="category_id" id="" class="form-control">
                <option value="">Please Select a Category</option>
              @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', Null)->get() as $parent){
                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child){
                  <option value="{{ $child->id }}">--{{ $child->name }}</option>
                }
                  
                @endforeach
              }
                
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Select A Brand</label>
            <select name="brand_id" id="" class="form-control">
                <option value="">Please Select A Brand</option>
              @foreach (App\Models\Brand::orderBy('name', 'asc')->get() as $child){
                <option value="{{ $child->id }}">{{ $child->name }}</option>
                
              }
              @endforeach
            </select>
          </div>
          
          
          {{-- <div class="form-group">
            <label>File upload</label>
            <input type="file" name="product_image" class="file-upload-default" placeholder="select image">
            
          </div> --}}
          <input type="file" name="product_image[]" class="file-upload-default" placeholder="select image">
          <input type="file" name="product_image[]" class="file-upload-default" placeholder="select image">
          <input type="file" name="product_image[]" class="file-upload-default" placeholder="select image">

          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
  <script>
   function myCloseFunction(){
    document.getElementById("alDanger").style.display= 'none';
  }
  </script>
@endsection
    
