@extends('backend.layout.master')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Manage Products</h4>
        @if (session()->has('success'))
            {{ session()->get('success'); }}
        @endif
       <div class="col-10">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Category Name</th>
              <th scope="col">Parent Category</th>
              <th scope="col">Description</th>
              <th scope="col">Image</th>
              
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($allCategories as $category)
            <tr>
              <td>{{ $category->name }}</td>
              <td>
                @if ($category->parent_id == NULL)
                Primary Category
                @else
                {{ $category->parent->name }}
                @endif
              </td>
              <td>{{ $category->description }}</td>
              <td><img src="{{ asset('storage/images/'.$category->image) }}" width="150" alt=""></td>
              
              <td><a class="btn btn-primary" href="{{ route('edit.category', $category->id) }}">Edit</a> | 
              <td><a class="btn btn-primary" href="{{ route('delete.category', $category->id) }}">Delete</a> | 
                

                  {{-- <a class="btn btn-primary" href="{{ route('edit.product', $product->id) }}">Edit</a>
                  <!-- Button trigger modal -->
<a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$product->id}}">
  Delete
</a> --}}

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('delete.product', $product->id) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-primary">Delete</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div> --}}
              </td>
            </tr>
          
          @endforeach
          </tbody>
        </table>
        <div class="pagination">
          {{ $allCategories->links() }}
        </div>
        
       </div>
      </div>
    </div>
  </div>
 
@endsection
    
