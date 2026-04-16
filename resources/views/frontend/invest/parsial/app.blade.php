<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <title>halal invest</title>

</head>
<body>
  
<!-- header start-->

@include('frontend.invest.parsial.header')
<!-- header end-->
<div class="container mx-auto px-4">
  @yield('content')
</div>
<!-- footer start-->
@include('frontend.invest.parsial.footer')
<!-- footer end-->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/frontend/js/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>


</body>
</html>


