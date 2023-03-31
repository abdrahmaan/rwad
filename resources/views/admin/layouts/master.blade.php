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

        <h3 class="title text-light d-flex align-items-center">
           @yield('title')
            {{-- <i class="@yield('icon')"></i> --}}
            
            <img id="logo-header" class="mx-2" src="/includes/img/logo.png" width="60px" alt="logo">
        </h3>

        <button class="btn btn-menu" style="height: fit-content;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
            <i class="bi bi-list" style="color: white; font-size: 40px;"></i>
        </button>
        
    </header>

 
       @include('admin.layouts.sidebar')

       
       <span class="highlight"></span>
       
       <h3 id="token"> </h3>
       
       
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


{{-- FireBase --}}

<!-- firebase integration started -->

<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
<!-- Firebase App is always required and must be first -->
<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-app.js"></script>
<!-- Add additional services that you want to use -->
<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-messaging.js"></script>

<script>
        // Your web app's Firebase configuration
      var firebaseConfig = {
        apiKey: "AIzaSyAM5eq0ZuamAwKxux8eW2GC4IfOZdPffk4",
        authDomain: "laravel-test-51843.firebaseapp.com",
        projectId: "laravel-test-51843",
        storageBucket: "laravel-test-51843.appspot.com",
        messagingSenderId: "243382548439",
        appId: "1:243382548439:web:f1a0129415b3c90bccbd92",
        measurementId: "G-SMH6TVBXK1"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
      //firebase.analytics();
      const messaging = firebase.messaging();
        messaging.requestPermission()

      .then(function () {

        console.log("Notification permission granted.");

        // get the token in the form of promise
        return messaging.getToken();

      })
      // Save Token To Database    
      .then(function(token) {


          let username = "{{session()->get('user-data')->Username}}";
          let device = window.innerWidth <= 800 ? "mopile" : "pc";

          let formData = new FormData();

          formData.append("token",token);
          formData.append("username",username);
          formData.append("device",device);

        fetch(`https://alrwad.me/api/admin/fcmtoken`,{
          method: "post",
          body: formData
        })
        .then(res  => res.json())
        .then(res => console.log(res))

        
      })
      .catch(function (err) {
        console.log("Unable to get permission to notify.", err);
      });

  

      messaging.onMessage(function(payload) {
          let notify;
          notify = new Notification(payload.notification.title,{
              body: payload.notification.body,
              icon: payload.notification.icon,
          });

         notify.addEventListener("click",(e)=>{
           e.preventDefault();
           window.open(payload.notification.click_action)
         })
          // console.log(payload.notification);
      });


      self.addEventListener('notificationclick', function(event) {       
          event.notification.close();
          // console.log(event);
      });


</script>


{{-- Test API For FCM Notification --}}
<script>

    let url = "https://fcm.googleapis.com/fcm/send";

    let obj = {

      registration_ids: [
        "f6ulPpP0tPY:APA91bGHO2rXymFr_bDs1oeXQUT2vnfWOse80r2Bi4USzZn9XRAUrnmpYFUqkCKQ7-cN_u4dbJmgP4bO3keLapleFgzAptKOEkJdXXG2UsAxG_ZGLjIAgOOk5jS_Mivi3BTE5iNtz_wU",
        "edxkd3yYt1I:APA91bH_QSm6VF-cxqq6Oh9tlKfEWBbDCn8uiiV7-TGWBHgfnVxwABaoDKqjah4y5I5aodWXtKEl2GJ__yT_yTEQkdrB4UXsPIJwQIagWcJmmFynpzSf6x5r0f5sF8fCFAaHkeunl2pl"

    ],
              notification :{
                  title: "69 س - تغيير فلتر زيت",
                  body : "تغيير فلتر زيت 300 كيلو عداد 200000 --- API",
                  icon : "https://alrwad.abdelrahmaan.com/includes/img/logo.png",
                  click_action: "http://127.0.0.1:8000/admin/notifcations",
                  image: "https://alrwad.abdelrahmaan.com/includes/img/logo.png",
              }

    }
    setTimeout(() => {
        fetch(url,{
          method: "post",
          body:JSON.stringify(obj),
          headers :{
            "Content-Type" : "application/json",
            "Authorization" : "key=AAAAOKq699c:APA91bEw7kBANGdxHUpQRS52rfw73nySdercsfi2fx3pu2rA_UsoCoQQb2neNWY_zqmOhF8jM2ZikFA1B7V8IXguhGxTu9uazuXVXfMbXfJHXFPSTRH5uvW01KFiGBYnXm5LRPxvQAKM"
          }
        })
    }, 6000000);
</script>

<script>

let menu = document.querySelector("header button.btn-menu");




  // Open Menu Shortcut
document.addEventListener("keydown",(e)=>{
  if(e.ctrlKey && e.keyCode == 16){
    menu.click();
  }
});


// Reset Input Shortcut
document.addEventListener("keydown",(e)=>{
 
  if(e.ctrlKey && e.keyCode == 18){
   if(! e.target.hasAttribute("readonly")){

       e.target.value = "";
    }
 }
});


// Click Enter On Input To Focus Next Input
document.addEventListener("keydown",(e)=>{
 if(e.target.dataset.tab){
    if(e.keyCode == 13){
     e.preventDefault();
      let nextInputIndex = e.target.dataset.tab;
      let nextInput = document.querySelectorAll("input");

      nextInput[nextInputIndex].focus();

    }
 }
})


// Click Enter On Input To Focus Next Input
document.addEventListener("keydown",(e)=>{
    if(e.keyCode == 13){
     e.preventDefault();

 }
})



</script>
</body>
</html>