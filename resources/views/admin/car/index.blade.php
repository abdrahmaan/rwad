@extends('admin.layouts.master')



@section('title',"بيانات السيارات")
@section('icon',"bi bi-car-front-fill")


@section('content')
   

{{-- {{dd($players)}} --}}




        <div class="container">
            <div class="row flex-row-reverse justify-content-center align-items-center m-0 p-0" style="min-height: 200px">
                <div class="data-name col-10 mb-4">
                    <h3 class="text-light text-center mb-3">طباشيرى</h3>
                    <input type="text" placeholder="طباشيري أو رقم اللوحة" class="form-control text-center mx-auto w-50">
                </div>
                <div class="data-filter col-10 col-lg-3 my-2">
                    <h3 class="text-light text-center mb-2">النوع</h3>
                    <select class="form-control text-center" name="" id="">
                        <option value="الكل">الكل</option>
                        <option value="ميكروباص">ميكروباص</option>
                        <option value="نقل أموال">نقل أموال</option>
                        <option value="ملاكى">ملاكى</option>
                        <option value="نصف نقل">نصف نقل</option>
                        <option value="موتوسيكل">موتوسيكل</option>
                  
                    </select>
                </div>
                <div class="data-filter col-10 col-lg-3 my-2">
                    <h3 class="text-light text-center mb-2">الفرع</h3>
                    <select class="form-control text-center" name="" id="">
                        <option value="الكل">الكل</option>
                        <option value="القاهرة">القاهرة</option>
                        <option value="الإسكندرية">الإسكندرية</option>
                    </select>
                </div>


                <div class="data-btn col-9 col-lg-7">
                    <button id="Search" class="btn btn-warning text-dark w-75 d-block mx-auto my-4">بحث</button>

                </div>
            </div>
        </div>


    <div id="players-area" class="row d-none d-flex justify-content-center m-0 p-0" style="min-height: 300px">

        <div class="player bg-dark col-12 col-lg-5 p-0  mx-2 my-3 d-flex justify-content-between align-items-center">
                
            <div class="player-img w-50 h-100">
                <a href="">
                    <img src="{{asset('includes/img/slide-1.jpg')}}" style="min-height: 508px" alt="player_photo">
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
        <div class="player-col col-10 col-lg-3  d-flex flex-lg-row flex-column align-items-center p-0 " style="border-radius: 40%">

            <div class="data-img d-flex justify-content-center align-items-center w-50" 
            style=" background-image: url('/playerimages/1674842545.jpg');border-radius: 15px 0px 0px 15px;">
            </div>


            <div class="data-text d-flex bg-dark flex-column justify-content-center align-items-center w-50" style="border-radius: 0px 15px 15px 0px">
                <span class="text-dark bg-warning mb-2 p-2 rounded">مهاجم</span>
                    <h4 class="text-warning text-center">أحمد محمد السيد</h4>
                    <h5 class="text-light my-2" style="direction: rtl">
                        <i class="bi bi-person-fill"></i>
                         15 سنة 
                    </h5>
 
                    <h6 class="text-light my-2">
                         تحت 21 سنة
                        <i class="bi bi-calendar-week"></i>
                    </h6>
                    <h6 class="text-light my-2">
                        ستاد مصر - السبت - 6 مساء
                        <i class="bi bi-calendar-week"></i>
                    </h6>
                    <h6 class="text-light my-2">
                       01110645479
                        <i class="bi bi-calendar-week"></i>
                    </h6>
                    <h6 class="text-success my-2">
                       مفعل
                        <i class="bi bi-calendar-week"></i>
                    </h6>
                    <a href="/admin/players/5" class="btn btn-success text-light mt-3">
                        ملف اللاعب
                        <i class="bi bi-skip-start-fill"></i>

                    </a>
                    <a href="/admin/players/5/edit" class="btn btn-warning text-dark mt-3">
                        تعديل بيانات اللاعب
                        <i class="bi bi-skip-start-fill"></i>
                    </a>
                    <a href="/admin/player/5/toggleactive" class="btn btn-warning text-dark mt-3">
                        تفعيل\تعطيل اللاعب
                        <i class="bi bi-skip-start-fill"></i>
                    </a>

            </div>
        </div>      
        <div class="player-col col-10 col-lg-3 d-flex flex-lg-row flex-colum align-items-center p-0" style=""> 

            <div class="data-img bg-dark d-flex justify-content-center  flex-column align-items-center w-50" 
            style="border-radius: 15px 0px 0px 15px;">
            <img src="/playerimages/myimg.jfif" width="220px" height="220px" style="border-radius: 50%; border: 4px solid white;" alt="">
            
           
                    <a href="/admin/players/5" class="btn btn-success text-light mt-3">
                        ملف اللاعب
                        <i class="bi bi-skip-start-fill"></i>

                    </a>
                    <a href="/admin/players/5/edit" class="btn btn-warning text-dark mt-3">
                        تعديل بيانات اللاعب
                        <i class="bi bi-skip-start-fill"></i>
                    </a>
                    <a href="/admin/player/5/toggleactive" class="btn btn-warning text-dark mt-3">
                        تفعيل\تعطيل اللاعب
                        <i class="bi bi-skip-start-fill"></i>
                    </a>
        </div>


            <div class="data-text d-flex bg-dark flex-column justify-content-center align-items-center w-50" style='border-radius: 0px 15px 15px 0px;'>
                <span class="text-dark bg-warning mb-2 p-2 rounded">مهاجم</span>
                    <h4 class="text-warning text-center">أحمد محمد السيد</h4>
                    <h5 class="text-light my-2" style="direction: rtl">
                        <i class="bi bi-person-fill"></i>
                         15 سنة 
                    </h5>
 
                    <h6 class="text-light my-2">
                         تحت 21 سنة
                        <i class="bi bi-calendar-week"></i>
                    </h6>
                    <h6 class="text-light my-2">
                        ستاد مصر - السبت - 6 مساء
                        <i class="bi bi-calendar-week"></i>
                    </h6>
                    <h6 class="text-light my-2">
                       01110645479
                        <i class="bi bi-calendar-week"></i>
                    </h6>
                    <h6 class="text-success my-2">
                       مفعل
                        <i class="bi bi-calendar-week"></i>
           

            </div>
        </div>      
        <div class="player-col col-10 col-lg-3 bg-dark d-flex flex-column align-items-center pt-4" style="min-width: 600px; min-height: 400px; margin : 20px">

        </div>
        <div class="player-col col-10 col-lg-3 bg-dark d-flex flex-column align-items-center pt-4" style="min-width: 600px; min-height: 400px; margin : 20px">

        </div>
    
    </div>


    <style>
        div.player-col{
            min-width: 600px;
             min-height: 500px;
             margin : 20px;
        }

        div.player-col .data-img{
            min-height: 100%;
            border-radius: 0px 15px 15px 0px;
            border-width: 0px 5px 5px 0px;
            border-color: yellow;
            border-style: solid;

            
        }
        div.player-col .data-text{
            min-height: 100%;
            border-width: 5px 0px 0px 0px;
            border-color: yellow;
            border-style: solid;
        }
        div.player-col a{
            text-decoration: none;
            color: white;
        }
    </style>


<style>


}

       .player{
        min-height: 350px;
        border-radius: 25px !important;
        box-shadow: -1px 2px 9px 0px black;
        overflow: hidden;
       
    }
     .player .player-img{
      
        overflow: hidden;
       
    }


     .player .player-img img {
            min-height: 350px;
            max-width: 100%;
            min-width: 100%;
            border-radius: 25px 0px 0px 25px;
            object-fit: cover;
            transition: all 0.5s ease;
        }

     .player .player-img img:hover {
            
        transform: scale(1.2);
        }

</style>





<script>


    fetch("http://ecoach.egy/api/admin/players")
    .then(res => res.json())
    .then(res =>{

        window.sessionStorage.setItem('players',JSON.stringify(res.response));

    });

    function HandleSearch() {

            // Inputs & Selects
            let select = document.querySelectorAll("select");
            let inputPlayerName = document.querySelectorAll("input")[0].value;
            let selectGroupName = select[0].value;
            let selectCategoryName = select[1].value;
            let selectBranch = select[2].value;
            let selectِActive = select[3].value;

            // AreaPlayer
            let Area = document.querySelector("#players-area");


            // Filters Checkers
            let GroupNameFilter = false;
            let BranchNameFilter = false;
            let CategoryNameFilter = false;
            let ActiveFilter = false;
            let PlayerInputFilter = false;


            // Counter
            let counter = 0;

            let DefaultImagepath ='/includes/img/bg-section.jpg';

            // Start Filter Logic  
            Area.innerHTML = "";
            Area.className.includes("d-none") ? Area.classList.remove("d-none")  : null;

            let data = JSON.parse(window.sessionStorage.getItem('players'));

            data.forEach(player => {
                
                let playerHTML = `
                <div class="player d-flex flex-column flex-lg-row bg-dark col-12 col-lg-5 p-0  mx-2 my-3 d-flex justify-content-center align-items-center" style="border-radius:25px">
                    
                    <div class="player-img"
                        style="
                        background-image: url('${player.ImagePath == null ? DefaultImagepath : `/playerimages/${player.ImagePath}`}');
                        background-position: center center;
                        background-size: cover;
                        min-height: 400px;
                        height: 100%;
                        width:100%;
                        border-radius: 25px ">

                        <a href="">
                            <!-- <img src="{{asset('includes/img/bg-section.jpg')}}" style="min-height: 508px" alt="player_photo"> -->  
                        </a>
                    </div>
                    <div class="one-player-data d-flex flex-column justify-content-center align-items-center h-100 py-4">
                        <h4 class="text-warning text-center">
                            ${player.PlayerName}
                            <i class="bi bi-person-fill"></i>

                            </h4>
                        <span class="text-dark bg-warning my-3 p-2 rounded w-25 text-center">
                            ${player.Position}
                            <i class="bi bi-person-fill"></i>
                            </span>
                        <h5 class="text-light my-2">
                            السن : ${player.Age}
                            <i class="bi bi-person-fill"></i>
                        </h5>
                        <h5 class="text-light my-2 fs-6">
                            ${player.CategoryName   }
                            <i class="bi bi-calendar-week"></i>
                        </h5>  
                        <h5 class="text-light my-2 fs-6">
                            ${player.GroupName}
                            <i class="bi bi-calendar-week"></i>
                        </h5>  
                        <h5 class="text-light my-2">
                            ${player.BranchName}
                            <i class="bi bi-calendar-week"></i>
                        </h5>  
                        <h5 class="${player.Status == "Active" ? 'text-success my-2' : 'text-danger my-2'}">
                            ${player.Status == "Active" ? 'مفعل' : 'غير مفعل'}
                            <i class="bi bi-calendar-week"></i>
                        </h5>  
                    <div id="player-buttons-area" class="row ps-3 flex-row-reverse p-0 m-0 justify-content-center">
                        <a href="/admin/players/${player.id}" class="btn btn-warning mt-3 col-2" style="height: fit-content; white-space: nowrap; width:fit-content">
                            ملف اللاعب
                            <i class="bi bi-skip-start-fill"></i>
                        </a>
                        <a href="/admin/players/${player.id}/edit" class="btn btn-success mt-3 col-2 mx-2" style="height: fit-content; white-space: nowrap; width:fit-content">
                            تعديل بيانات 
                            <i class="bi bi-skip-start-fill"></i>
                        </a>
                        <div class="row justify-content-center ps-3 mx-auto m-0 p-0">
                            <a href="/admin/skills/create/${player.id}" class="btn btn-warning mt-3 col-5">
                             مهارة
                            <i class="bi bi-skip-start-fill"></i>
                        </a>
                        <a href="/admin/toggleactive/${player.Status}/${player.id}" class="${ player.Status == "Active" ? 'btn btn-danger mt-3 col-5 mx-2' : 'btn btn-success mt-3 col-5 mx-2' }">
                            ${ player.Status == "Active" ? 'تعطيل' : 'تفعيل' }
                            <i class="bi bi-skip-start-fill"></i>
                        </a>
                        </div>
                        <a href="/admin/payments/create/${player.id}" class="btn btn-success mt-3 col-2" style="height: fit-content; white-space: nowrap; width:fit-content">
                            دفع إشتراك
                            <i class="bi bi-coin"></i>
                        </a>
                       
                        </div>
                    </div>
                </div>
                `;

                if(selectGroupName == "الكل" ){
                    GroupNameFilter = true;
                } else {
                    if(selectGroupName == player.GroupName){
                        GroupNameFilter = true;
                    } else {

                        return;
                    }

                }
                if(selectCategoryName == "الكل"){
                    CategoryNameFilter = true;
                } else {
                    if( selectCategoryName == player.CategoryName){
                        CategoryNameFilter = true;
                    } else {

                        return;
                    }

                }


                if(selectBranch == "الكل" ){
                    BranchNameFilter = true;
                } else {
                    if(selectBranch == player.BranchName){
                        BranchNameFilter = true;
                    } else {

                        return;
                    }

                }

                if(selectِActive == "الكل" ){
                    ActiveFilter = true;
                } else {
                    if(selectِActive == player.Status){
                        ActiveFilter = true;
                    } else {

                        return;
                    }

                }

                if(inputPlayerName == ""){

                    PlayerInputFilter = true
                } else {

                    if(player.PlayerName.includes(inputPlayerName)){

                        PlayerInputFilter = true;

                    } else {

                        return;

                    }
                }


                if(PlayerInputFilter && GroupNameFilter && BranchNameFilter && CategoryNameFilter && ActiveFilter){

                    //  Log The Player Found
                    console.log(player);
                    // Plus Counter
                    counter += 1;

                    // Render Player
                    Area.innerHTML += playerHTML;
                }

            });

            if(counter < 1){

            Area.innerHTML = "";
            Area.className.includes("d-none") ? null : Area.classList.add("d-none");
            Swal.fire({
                icon: "info",
                title: "لا يوجد بيانات",
                confirmButtonText: "رجوع",
                 confirmButtonColor: "#e01a22",
            })
            console.log("no Data Found");
            }


}
    
    
    let btn = document.querySelector("button#Search");
    
    btn.addEventListener("click",() => HandleSearch());
    


    let Input = document.querySelectorAll("input");


  


</script>

@endsection 