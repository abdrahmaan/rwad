
@extends('layout.master')    

@section('title', env("APP_NAME") . " | أهلا")
    
@section('css')
        <!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Changa:wght@300;400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

@endsection
   
@section('content') 
    <section class="hero">
        <div class="container pb-4" style="min-height: 430px">
            <div class="row justify-content-center align-items-center m-0 p-0" style="min-height: 430px">
                <div data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500" class="col-lg-5 col-10 d-flex flex-column align-items-center">
                    <img id="image-hero" src="/includes/img/banner4.jpg" width="100%" alt="">
                </div>
                <div data-aos="zoom-out" data-aos-duration="1000" class="col-lg-5 col-10 d-flex flex-column align-items-center">
                    <h2 id="title" class="text-center">
                        {{ __('home.hero-title')}}
                     </h2>
                     <h2 id="desc" class="text-center">
                      {{ __('home.hero-desc')}}
                     </h2>
                </div>
            </div>
            <a class="btn btn-success text-light  w-25 mx-auto d-block" href="/players">شوف</a>
        </div>
    </section>


    <section class="services py-4" style="min-height: 400px">
        <div class="container" style="min-height: 400px">
            <div class="row p-0 m-0 justify-content-center align-items-center" style="min-height: 400px">
                <div data-aos="zoom-in" data-aos-duration="1000"  class="col-lg-3 col-10 d-flex flex-column justify-content-center align-items-center">
                    <img class="mb-2" src="/includes/img/icons/football.png" width="118px" alt="">
                    <h2 class="fw-bold fs-4">{{__('home.one-title')}}</h2>
                    <p class="text-center fs-5">{{__('home.one-desc')}}</p>
                </div>
                <div data-aos="zoom-out" data-aos-duration="1000" class="col-lg-3 col-10 d-flex flex-column justify-content-center align-items-center">
                    <img class="mb-2" src="/includes/img/icons/shoot.png" width="118px" alt="">
                    <h2 class="fw-bold fs-4 text-center">{{__('home.two-title')}}</h2>
                    <p class="text-center fs-5">{{__('home.two-desc')}}</p>
                </div>
                <div data-aos="zoom-in" data-aos-duration="1000"  class="col-lg-3 col-10 d-flex flex-column justify-content-center align-items-center">
                    <img class="mb-2" src="/includes/img/icons/ball.png" width="118px" alt="">
                    <h2 class="fw-bold fs-4 text-center">{{__('home.three-title')}}</h2>
                    <p class="text-center fs-5">{{__('home.three-desc')}}</p>
                </div>

            </div>
        </div>
    </section>

    <section class="promotion py-3 bg-secondary" style="min-height: 340px">
        <div data-aos="fade-left" data-aos-duration="1000" class="container w-100 text-center d-flex flex-column align-items-center justify-content-center" style="min-height: 340px">
            <h2 class="title-promotion text-warning fs-1">
                {{__('home.pro-title')}}
            </h2>
            <p class="data-promotion text-light fs-4">
                {{__('home.pro-desc')}}

            </p>
        </div>
    </section>


    <section class="social py-1 bg-light" style="min-height: 300px">

        
        <div data-aos="flip-left" data-aos-duration="1000" class="container p-0 d-flex flex-column justify-content-center align-items-center" style="min-height: 300px">
            <h3 class="text-center text-success fw-bold my-4">- تابعنا بسهولة -</h3>
            
            <div class="icons d-flex justify-content-center align-items-center">
                <a href=""><i id="icon-social"  class="bi bi-facebook mx-3 text-success"></i></a>
                <a href=""><i id="icon-social" class="bi bi-instagram mx-3 text-success"></i></a>
                <a href=""><i id="icon-social" class="bi bi-youtube mx-3 text-success"></i></a>
                <a href=""><i id="icon-social" class="bi bi-whatsapp mx-3 text-success"></i></a>
            </div>
         
        </div>
    </section>
    <section class="form py-1 bg-dark" style="min-height: 400px">

        <div data-aos="zoom-in" class="container d-flex justify-content-center align-items-center" style="min-height: 400px">
                <div id="form-data" class="d-flex flex-column justify-content-center align-items-center">
                        <form action="">
                            <h2 class="text-warning mb-4 text-center" style="font-size: 30px">! هنكلمك فى أسرع وقت</h2>
                             <input class="form-control w-100 text-center mx-auto" placeholder="سيب رقم تيليفونك" type="text">
                            <button class="btn btn-success text-light mx-auto w-100 my-4">سجل رقمك</button>
                        </form>
                </div>

               

        </div>
    </section>


    <style>

        *{
            user-select: none;
        }
        section.hero{
            min-height: 430px;
            background-image: url('/includes/img/banner5.jpg');
            background-position: center center;
            position: relative;
            background-attachment: fixed;
        }
        section.hero::before{
            content: "";
            height: 100%;
            width: 100%;
            background-color: rgb(0 0 0 / 40%);
            top: 0;
            right: 0;
            position: absolute;
        }

        h2#title{
            color:  white;
            text-shadow: -3px 0px 3px rgb(0 0 0 / 70%);
            transform: rotateX(-21deg) rotateY(21deg);
            font-size: 40px;
        }
        h2#desc{
            color: white;
            text-shadow: -3px 0px 3px rgb(0 0 0 / 70%);

            transform: rotateX(-21deg) rotateY(21deg);
            font-size: 25px;

        }

        #image-hero{
            border-radius:30% 70% 70% 30% / 30% 30% 70% 70%  ;
            box-shadow:  9px 9px 15px rgb(0 0 0 / 70%);
      
        }

        section.promotion{
        background-image: url('/includes/img/banner6.jpg');
        background-position: center center;
        background-size: cover;
        position: relative;
        background-attachment: fixed;


        }  
        
        section.promotion::before{
            content: "";
            height: 100%;
            width: 100%;
            background-color: rgb(0 0 0 / 64%);
            top: 0;
            right: 0;

            position: absolute;
        }

        h2.title-promotion{
           text-shadow:  3px 0px 3px rgb(0 0 0 / 70%);
        }
        p.data-promotion{
            max-width: 600px;
            text-shadow: 3px 0px 3px rgb(0 0 0 / 70%);
        }

        i#icon-social{
            font-size: 50px
        }

        section.form{
        background-image: url('/includes/img/banner2.jpg');
        background-position: center center;
        background-size: cover;
        position: relative;
        background-attachment: fixed;

        } 
          
        section.form::before{
            content: "";
            height: 100%;
            width: 100%;
            background-color: rgb(0 0 0 / 71%);
            top: 0;
            right: 0;

            position: absolute;
        } 
        
        @media(min-width: 319px) and (max-width: 720px){
            h2#title{

            font-size: 33px;
            }
            a.btn{
                width: 75% !important;
            }
            a.btn{
                width: 75% !important;
            }
        h2#desc{

            font-size: 20px;

        }

        #image-hero{
            width: 120%;
      
        }

    }
    </style>

@endsection




@section('script')
    
<script src="{{asset('includes/home/custom/js/home.js')}}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
@endsection

