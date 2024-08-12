@extends('frontend.layout.master')
@section('content')
<div class="col-xl-8">
    <h1>Fetured Products</h1>
    <div class="row">
        <div class="col-xl-3">
            <div class="widgets">
                <div class="card">
                    <img src="{{ asset('frontend') }}/assets/img/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Samsung</h5>
                      <p class="card-text">Taka - 5000</p>
                      <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                  </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="widgets">
                <div class="card">
                    <img src="{{ asset('frontend') }}/assets/img/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Samsung</h5>
                      <p class="card-text">Taka - 5000</p>
                      <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                  </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="widgets">
                <div class="card">
                    <img src="{{ asset('frontend') }}/assets/img/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Samsung</h5>
                      <p class="card-text">Taka - 5000</p>
                      <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection