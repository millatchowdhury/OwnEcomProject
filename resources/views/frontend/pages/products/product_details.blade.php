@extends('frontend.layout.master')
@section('title')
{{ $product->title }}
@endsection
@section('content')
<div class="col-xl-8">
    <h1>Details Products</h1>
    
    <div class="row" style="background: #d3d2eb">
      <div class="col-xl-6">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                @php
                    $i = 0;
                @endphp
                @foreach ($product->images as $image)
                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/images/'.$image->image) }}" class="d-block w-100" alt="{{ $product->title }}">
                    
                  </div>
                  @php
                      $i++;
                  @endphp
                @endforeach
              
              
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
      </div>
      <div class="col-xl-6">

      </div>
       
        
    </div>
</div>
{{-- <div class="pagination">
  {{ $product->links() }}
</div> --}}
<h1>{{ $product->title }}</h1>
        <h3>{{ $product->price }}</h3>
        <h3>
            {{ $product->quantity < 1 ? 'Not Available' : $product->quantity."Is Available" }}
        </h3>
        <p>{{ $product->description }}</p>
      </div>
@endsection