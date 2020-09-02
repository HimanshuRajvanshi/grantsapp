<!DOCTYPE html>

<html lang="en">

 <head>

   @include('layout.partials.head')

 </head>

 <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">


@include('layout.partials.nav')

@include('layout.partials.header')

@yield('content')

@include('layout.partials.footer')

@include('layout.partials.footer-script')

 </body>

</html>
