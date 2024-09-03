@extends('backend.layout.master')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New Products</h4>
        
        <form class="forms-sample" method="POST" action="{{ route('update.brand', $brand->id) }}" enctype="multipart/form-data">
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
            <label for="exampleInputName1">Brand Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputName1" value="{{ $brand->name }}">
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail3">Description</label>
            <textarea type="text" class="form-control" name="description" id="exampleInputEmail3" >{{ $brand->description }}</textarea>
          </div>
          
          <div class="form-group">
            <label for="">Old Image</label>
            {{-- <img src="{{ asset('storage/images/'.$category->image) }}" alt=""> --}}
            <img src="{{ asset('storage/images/'.$brand->image) }}" width="150" alt="">
          </div>
          
          <div class="">
            <label>File upload</label>
            <input type="file" name="brandImageNew" class="file-upload-default" placeholder="select Brand image">
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
    
