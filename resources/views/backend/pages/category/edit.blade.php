@extends('backend.layout.master')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New Products</h4>
        
        <form class="forms-sample" method="POST" action="{{ route('update.category', $category->id) }}" enctype="multipart/form-data">
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
            <label for="exampleInputName1">Category Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputName1" value="{{ $category->name }}">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Parent Category</label>
            <Select class="form-control" name="parent_id_Select_CustomId">
              <option value="">Select Parent Category (Optional)</option>
              @foreach ($mainCategories as $cat)
                <option value="{{ $cat->id }}"{{ $cat->id == $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>
              @endforeach
            </Select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Description</label>
            <textarea type="text" class="form-control" name="description" id="exampleInputEmail3" >{{ $category->description }}</textarea>
          </div>
          
          <div class="form-group">
            <label for="">Old Image</label>
            <img src="{{ asset('storage/images/'.$category->image) }}" alt="">
          </div>
          
          <div class="">
            <label>File upload</label>
            <input type="file" name="categoryImage" class="file-upload-default" placeholder="select cat image">
          </div>
          

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
    
