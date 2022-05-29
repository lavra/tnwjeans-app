<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  @stack('title')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  @stack('head')
</head>
@stack('body')
<!-- Site wrapper -->
<div class="wrapper">

  @include('admin.layouts.top-nav._navbar') 

  @include('admin.layouts.main-sidebar._sidebar') 

  @yield('content')
</div>
<!-- ./wrapper -->  
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@stack('scripts')
</body>
</html>