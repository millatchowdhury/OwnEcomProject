@extends('frontend.layout.master')
@section('content')
<div class="col-xl-8">
    <h1>Fetured Products</h1>
    {{-- {{ $products }} --}}
    {{-- {{ $proImage }} --}}
    <div class="row">
      @foreach ($products as $product)
        <div class="col-xl-3">
            <div class="widgets">
                <div class="card">
                  @php
                    $i = 1;
                  @endphp

                  @foreach($product->images as $image)
                    @if ($i > 0)
                    <a href="{{ route('details.product', $product->slug) }}"><img src="{{ asset('storage/images/'.$image->image) }}" class="card-img-top" alt="..."></a>
                    @endif
                    @php
                      $i--;
                    @endphp
                  @endforeach
                    <div class="card-body">
                      <h5 class="card-title"><a href="{{ route('details.product', $product->slug)  }}">{{ $product->title }}</a></h5>
                      <p class="card-text">Taka - {{ $product->price }}</p>
                      <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                  </div>
            </div>
        </div>
        @endforeach
       
        
    </div>
</div>
{{-- <div class="pagination">
  {{ $product->links() }}
</div> --}}
@endsection