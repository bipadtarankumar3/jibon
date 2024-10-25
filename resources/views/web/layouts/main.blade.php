<!DOCTYPE html>

<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sahaj Jibon Service Pvt. Ltd</title>
    <link rel="icon" href="https://anusilanservices.com/img/core-img/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/classy-nav.css"> -->
    <link rel="stylesheet" href="{{URL::TO('public/assets/css/style_public_web.css')}}">
  </head>

<body>




    @include('web.layouts.header')
    @include('web.layouts.validation')


    @yield('content')
    @include('web.layouts.footer')

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>
   <script src="{{URL::To('public/assets/js/custom-public.js')}}"></script>
 </body>
 </html>
