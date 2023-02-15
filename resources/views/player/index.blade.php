
@extends('layout.master')    

@section('title', env("APP_NAME") . " | اللاعبين")


@section('css')
        <!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Changa:wght@300;400&display=swap" rel="stylesheet">
@endsection
   
@section('content')
    <section class="player-list d-flex flex-column justify-content-center align-items-center">
        <h2 class="text-light">أمهر اللاعبين لدينا</h2>
        <div class="dropdown-divider"></div>
        <span class="highlight"></span>
        <img src="includes/img/wave.svg" alt="wave">
    </section>

    <section class="players-data container">
        <section class="search-player d-flex flex-column justify-content-center align-items-center">
            <h3 class="mb-3">
                إبحث عن لاعب
                <i class="bi bi-search text-dark"></i>
            </h3>
            <input type="text" class="form-control text-center">
            <button class="btn-search btn btn-dark mt-3 ">إبحث</button>
        </section>


        <section id="players-collection" class="players-collection d-none row p-0 m-0 justify-content-center mt-5">

            <div class="player bg-dark col-12 col-lg-5 p-0  mx-2 my-3 d-flex justify-content-between align-items-center">
                
                <div class="player-img w-50 h-100">
                    <a href="">
                        <img src="includes/img/players/2.jpg" alt="player_photo">
                    </a>
                </div>
                <div class="player d-flex flex-column justify-content-center align-items-center h-100 w-50 pt-4">
                    <span class="text-dark bg-warning mb-2 p-2 rounded">مهاجم</span>
                    <h4 class="text-warning text-center">أحمد محمد السيد</h4>
                    <h5 class="text-light my-2">
                        السن : 15
                        <i class="bi bi-person-fill"></i>
                    </h5>
                    <h5 class="text-light my-2">
                        مواليد : 2007
                        <i class="bi bi-calendar-week"></i>
                    </h5>
                    <h5 class="text-light my-2">
                    التقيـيــم
                    </h5>
                    <span class="reviews mb-2">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </span>   
                    <a href="" class="btn btn-warning">
                        ملف اللاعب
                        <i class="bi bi-skip-start-fill"></i>

                    </a>
                </div>
            </div>      
            <div class="player bg-dark col-12 col-lg-5 p-0  mx-2 my-3 d-flex justify-content-between align-items-center">
                
                <div class="player-img w-50 h-100">
                    <a href="">
                        <img src="includes/img/players/3.jpg" alt="player_photo">
                    </a>
                </div>
                <div class="one-player-data d-flex flex-column justify-content-center align-items-center h-100 w-50 pt-4">
                    <span class="text-dark bg-warning mb-2 p-2 rounded">خط الوسط</span>
                    <h4 class="text-warning text-center">كريم على فريد</h4>
                    <h5 class="text-light my-2">
                        السن : 18
                        <i class="bi bi-person-fill"></i>
                    </h5>
                    <h5 class="text-light my-2">
                        مواليد : 2004
                        <i class="bi bi-calendar-week"></i>
                    </h5>
                    <h5 class="text-light my-2">
                    التقيـيــم
                    </h5>
                    <span class="reviews mb-2">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </span>   
                    <a href="" class="btn btn-warning">
                        ملف اللاعب
                        <i class="bi bi-skip-start-fill"></i>

                    </a>
                </div>
            </div>      
            <div class="player bg-dark col-12 col-lg-5 p-0  mx-2 my-3 d-flex justify-content-between align-items-center">
                
                <div class="player-img w-50 h-100">
                    <a href="">
                        <img src="includes/img/players/1.jpg" alt="player_photo">
                    </a>
                </div>
                <div class="one-player-data d-flex flex-column justify-content-center align-items-center h-100 w-50 pt-4">
                    <span class="text-dark bg-warning mb-2 p-2 rounded">خط الدفاع</span>
                    <h4 class="text-warning text-center">يارا شاذلى محمود</h4>
                    <h5 class="text-light my-2">
                        السن : 20
                        <i class="bi bi-person-fill"></i>
                    </h5>
                    <h5 class="text-light my-2">
                        مواليد : 2001
                        <i class="bi bi-calendar-week"></i>
                    </h5>
                    <h5 class="text-light my-2">
                    التقيـيــم
                    </h5>
                    <span class="reviews mb-2">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </span>   
                    <a href="" class="btn btn-warning">
                        ملف اللاعب
                        <i class="bi bi-skip-start-fill"></i>

                    </a>
                </div>
            </div>      
            <div class="player bg-dark col-12 col-lg-5 p-0  mx-2 my-3 d-flex justify-content-between align-items-center">
                
                <div class="player-img w-50 h-100">
                    <a href="">
                        <img src="includes/img/players/4.jpg" alt="player_photo">
                    </a>
                </div>
                <div class="one-player-data d-flex flex-column justify-content-center align-items-center h-100 w-50 pt-4">
                    <span class="text-dark bg-warning mb-2 p-2 rounded">رأس حربة</span>
                    <h4 class="text-warning text-center">كارما أسر كريم</h4>
                    <h5 class="text-light my-2">
                        السن : 19
                        <i class="bi bi-person-fill"></i>
                    </h5>
                    <h5 class="text-light my-2">
                        مواليد : 2003
                        <i class="bi bi-calendar-week"></i>
                    </h5>
                    <h5 class="text-light my-2">
                    التقيـيــم
                    </h5>
                    <span class="reviews mb-2">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </span>   
                    <a href="" class="btn btn-warning">
                        ملف اللاعب
                        <i class="bi bi-skip-start-fill"></i>

                    </a>
                </div>
            </div>      
                

        </section>



    </section>



        <style>
                /* Main Rules */
                *{
                    margin: 0px;
                    padding: 0px;
                    box-sizing: border-box;
                }

                body{
                    font-family: "Changa" , sans-serif;
                    overflow-x: hidden;
                }

                h1,h2,h3,h4,h5,h6,span{
                    margin: 0;
                    padding: 0;
                    user-select: none;
                }

                input{
                    background: #eeeeee !important;
                    width: 50% !important;
                }

                input:focus{
                box-shadow: 0 0 0 0 transparent !important;
                border:  1px solid gray !important;
                }
                

                /* Main Rules */

                .player-list{

                    height: 330px;
                    background: url("includes/img/bg-section.jpg") bottom center no-repeat;
                    position: relative;
                    transition: all 0.5s ease;
                    overflow: hidden;
                
                }

                .player-list .highlight{
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    top: 0;
                    background-color: rgba(0, 0, 0, 0.53);

                }

                .player-list h2{
                    z-index: 1000;
                    user-select: none;
                }

                


                .dropdown-divider{
                    background-color: yellow;
                    margin-top: 35px;
                    width: 20px;
                    margin: 15px auto;
                    height: 6px;
                    z-index: 100;
                    transition: all 0.5s ease;

                }

                .player-list:hover .dropdown-divider{
                    width: 260px;

                    
                }

                .player-list > img{
                    position: absolute;
                    z-index: 1000;
                    bottom: -100px;
                    
                }

                @media (min-width: 319px ) and (max-width:576px) {
                    .player-list > img{
                    
                    bottom: 0;
                    
                }

                input{
                    width: 75% !important;
                }
                }   


                @media (min-width: 576px ) and (max-width:980px) {
                    .player-list > img{
                    
                    bottom: -29px;
                    
                }
            }

            .players-data .players-collection .player{
                min-height: 350px;
                border-radius: 25px;
                box-shadow: -1px 2px 9px 0px black;
                overflow: hidden;
            
            }
            .players-data .players-collection .player .player-img{
            
                overflow: hidden;
            
            }


            .players-data .players-collection .player .player-img img {
                    min-height: 350px;
                    max-width: 100%;
                    border-radius: 25px 0px 0px 25px;
                    object-fit: cover;
                    transition: all 0.5s ease;
                }

            .players-data .players-collection .player .player-img img:hover {
                    
                transform: scale(1.2);
                }

                .pagintaion{
                    min-height: 50px;
                }

                .pagintaion > span{
                    margin: 0px 20px;
                    text-align: center;
                    padding: 18px;
                    cursor: pointer;
                }
                .pagintaion > span.active{
                    background-color: #38414a !important;
                }
                .pagintaion > span:hover{
                    background-color: #38414a !important;
                }
        </style>

@endsection


@section('script')
    
<script src="{{asset('includes/home/custom/js/players.js')}}"></script>

@endsection

