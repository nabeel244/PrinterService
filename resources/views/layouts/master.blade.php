<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/js/all.min.js">
        </script>
    @stack('style')
    <title>{{ $title }}</title>
  </head>
  <body>

      <!-- NavBar Section Start-->
    @include('partials.navbar')
      <!-- NavBar Section End  -->

      <!-- Content Section Start -->
           @yield('content')
      <!-- End Content Section -->

  <!-- Footer Section Start -->
   @include('partials.footer')
  <!-- End Footer Section -->

<!-- Java Script Code Start-->
@include('partials.scripts')
<!-- Java Script Code End-->

  </body>
</html>
