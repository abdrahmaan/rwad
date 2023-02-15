
@extends('layout.master')

@section('title', env("APP_NAME") . " | تسجيل الدخول")

@section('css')

<link rel="stylesheet" href="{{asset('includes/custom/css/main.css')}}">
<link rel="stylesheet" href="{{asset('includes/home/custom/css/login.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Changa:wght@300;400&display=swap" rel="stylesheet">

@endsection


{{-- {{dd(session()->get('user-data')->Role)}} --}}

@section('content')
    <section class="login-background d-flex justify-content-center align-items-center">
    <span class="highlight"></span>
    <form class="w-100" action="/login" method="POST">
        @csrf
        
    <div class="login-form w-75 mx-auto d-flex flex-column justify-content-center align-items-center">
        {{-- <i class="bi bi-unlock-fill text-warning fs-1"></i> --}}
       {{-- <h2 class="text-warning fs-1 mb-4">تسجيل الدخول</h2> --}}
       <h2 class="text-light fs-4">إسم المستخدم</h2>
       <input type="text" placeholder="Username" name="username" class="form-control mx-auto w-50 text-center my-2" >
       <h2 class="text-light fs-4 mt-2">كلمة السر</h2>
       <input type="password" placeholder="Password" name="password" class="form-control mx-auto w-50 text-center my-2" >
       <button type="submit" class="btn-login btn btn-danger text-light  my-3">تسجيل الدخول</button>
    </div>
</form>

</section>

<script>
    window.localStorage.removeItem("role");
</script>
    

@endsection

@section('script')

<script src="{{asset('includes/home/custom/js/login.js')}}"></script>
    
@endsection

