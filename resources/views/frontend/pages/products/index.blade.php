@extends('frontend.layout.master')
@section('content')
<div class="col-xl-8">
    <h1>Fetured Products</h1>
    <h3>{{ $products }}</h3>
    <div class="row">
      @foreach ($products as $product)
        <div class="col-xl-3">
            <div class="widgets">
                <div class="card">
                  @foreach($product->images as $image)
                  <h1>{{ $product }}</h1>
                    <img src="{{ asset('frontend/assets/img/'.$image->image) }}" class="card-img-top" alt="...">
                  @endforeach
                    <div class="card-body">
                      <h5 class="card-title">{{ $product->title }}</h5>
                      <p class="card-text">Taka - {{ $product->price }}</p>
                      <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                  </div>
            </div>
        </div>
        @endforeach
       
        
    </div>
</div>
@endsection