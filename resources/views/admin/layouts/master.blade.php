<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('includes/lib/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="{{asset('includes/custom/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('includes/custom/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('includes/custom/css/sidebar.css')}}">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300;400;500&display=swap" rel="stylesheet">
    @yield('css')
    <script src="{{asset('includes/lib/sweetalert2.all.min.js')}}"></script>  

    <title>@yield('title')</title>
</head>
<body>
  

    <!-- Header -->
    <header class="d-flex justify-content-end align-items-center px-lg-5 px-1">

        <h3 class="title text-light">
           @yield('title')
            <i class="@yield('icon')"></i>
        </h3>

        <button class="btn" style="height: fit-content;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
            <i class="bi bi-list" style="color: white; font-size: 40px;"></i>
        </button>
        
    </header>

        

       @include('admin.layouts.sidebar')

       
       <span class="highlight"></span>
       
       
       
       
       @if(session()->has('message'))
        <div id="alert" class="bg-success text-center d-flex align-items-center justify-content-center py-4" style="min-height: 90px; margin-top: -7px; transition: 0.3s ease-out">
            <h2 class="text-light">{{session()->get('message')}}</h2>
        </div>
        <script>
            setTimeout(() => {
                    let x = document.querySelector("#alert");
                    x.classList.add("d-none");              
                    console.log("yeds");
            }, 2000);
        </script>
      
      @endif

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


    @if (session()->has("error"))
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

       <script src="{{asset('includes/custom/js/classes.js')}}"></script>
       
       @yield('content')

       @yield('script')
       


<script src="{{asset('includes/lib/bootstrap.bundle.min.js')}}"></script>
</body>
</html>