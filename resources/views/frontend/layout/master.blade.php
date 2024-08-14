<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
</head>
<body>
    <!-- menu start  -->
   @include('frontend.partials.nav')
    <!-- menu end  -->

    <!-- content start  -->
     <div class="content-area">
        <div class="container-fluid">
            <div class="row">
                @include('frontend.partials.sidebar')
                @yield('content')
            </div>
        </div>
     </div>
    <!-- content end  -->

    <script src="./assets/js/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>