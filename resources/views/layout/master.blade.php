<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{asset('includes/lib/bootstrap.min.css')}}">
    <!-- Css  -->
    <link rel="stylesheet" href="{{asset('includes/home/custom/css/header.css')}}">
    @yield('css')
    <title>@yield('title')</title>
</head>
<body>

    @yield('sidebar')
    @yield('content')


    <script src="{{asset('includes/lib/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('includes/lib/popper.js')}}"></script>
    <script src="{{asset('includes/lib/bootstrap.min.js')}}"></script>
    <script src="{{asset('includes/lib/sweetalert2.all.min.js')}}"></script>  
    <script src="{{asset('includes/home/custom/js/classes.js')}}"></script>

 

    @yield('script')

    @if($errors->any())
    <script>
      Swal.fire({
        icon: "error",
        title: "! تنبيه",
        text: '{{$errors->all()[0]}}',
         confirmButtonText: "رجوع",
         confirmButtonColor: "#e01a22",
      })
    </script>
    @endif

    @if(session()->has('error'))
    <script>
      Swal.fire({
        icon: "error",
        title: "! تنبيه",
        text: '{{session()->get("error")}}',
         confirmButtonText: "رجوع",
         confirmButtonColor: "#e01a22",
      })
    </script>
    @endif

</body>
</html>