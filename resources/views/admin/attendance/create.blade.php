@extends('admin.layouts.master')



@section('title',"تسجيل حضور")


@section('content')
   

{{-- {{dd($players)}} --}}



<form action="{{ route('attendances.store') }}" method="post">
    @csrf
    @method("POST")
        <div class="container">

            <div class="row flex-row-reverse justify-content-center m-0 p-0" style="min-height: 200px">
                <div class="data-name col-10 mb-4">
                    <h3 class="text-warning text-center mb-3">إسم اللاعب</h3>
                    <input type="text" placeholder="إسم اللاعب ثلاثى" class="form-control text-center mx-auto w-50">
                </div>
                <div class="data-filter col-10 col-lg-3 my-2">
                    <h3 class="text-warning text-center mb-2">المجموعة</h3>
                    <select class="form-control text-center" name="GroupName" id="">
                        @foreach ($Groups as $Group)
                        <option value="{{$Group->GroupName}} - {{$Group->Day}} - {{$Group->Time}}">{{$Group->GroupName}} - {{$Group->Day}} - {{$Group->Time}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="data-filter col-10 col-lg-3 my-2">
                    <h3 class="text-warning text-center mb-2">التصنيف</h3>
                    <select class="form-control text-center" name="" id="">
                        <option value="الكل">الكل</option>
                        <option value="تحت 21 سنة">تحت 21 سنة</option>
                        <option value="تحت 17 سنة">تحت 17 سنة</option>
                        <option value="تحت 13 سنة">تحت 13 سنة</option>
                    </select>
                </div>
                <div class="data-filter col-10 col-lg-3 my-2">
                    <h3 class="text-warning text-center mb-2">الفرع</h3>
                    <select class="form-control text-center" name="" id="">
                    <option value="الكل">الكل</option>
                        @foreach ($Branches as $Branch)
                        <option value="{{$Branch->BranchName}}">{{$Branch->BranchName}}</option>
                        @endforeach
                    </select>
                </div>  
                <div class="data-btn col-9 col-lg-4">
                    <div id="Search" class="btn btn-warning text-dark w-100 d-block mx-auto my-4">بحث</div>

                </div>
            </div>
        </div>


        <h3 id="counter" class="text-warning text-end pe-5 my-4 d-none">عدد اللاعبين : 6<h3>
        <h3 id="counter-select" class="text-success text-end pe-5 my-4 d-none">عدد المحدد : 6<h3> 
            <input id="playernames" hidden name="PlayerNames"  type="text">
            <button id="btn-hdor" type="submit" class="btn d-none btn-success d-block mx-auto">حضور الكل</button>
            <div id="players-area" class="row d-none d-flex justify-content-center m-0 p-0" style="min-height: 300px">


    
        </div>

    </form>

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

            // Prevent Counter And Button Attendance
            let counterArea = document.querySelector("h3#counter-select");
            let btnHdor = document.querySelector("button#btn-hdor");
            let TextNames = document.querySelector("input#playernames");

            counterArea.className.includes("d-none") ?  null : counterArea.classList.add("d-none") ;
            btnHdor.className.includes("d-none") ? null : btnHdor.classList.add("d-none");
            TextNames.value = "";

            
            // Inputs & Selects
            let select = document.querySelectorAll("select");
            let inputPlayerName = document.querySelectorAll("input")[2].value;
            let selectGroupName = select[0].value;
            let selectCategoryName = select[1].value;
            let selectBranch = select[2].value;
            let counterHTML = document.querySelector("h3#counter");

            // AreaPlayer
            let Area = document.querySelector("#players-area");


            // Filters Checkers
            let GroupNameFilter = false;
            let BranchNameFilter = false;
            let CategoryNameFilter = false;
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
                    
                    <div class="player-img w-50"
                        style="
                        background-image: url('${player.ImagePath == null ? DefaultImagepath : `/playerimages/${player.ImagePath}`}');
                        background-position: center center;
                        background-size: cover;
                        min-height: 400px;
                        height: 100%;
                        width:100%;
                        border-radius: 25px">
                    </div>
                    <div class="one-player-data w-50 d-flex flex-column justify-content-center align-items-center h-100 py-4">
                        <h4 class="text-warning text-center">
                            ${player.PlayerName}
                            <i class="bi bi-person-fill"></i>

                            </h4>
                        <span class="text-dark bg-warning my-3 p-2 rounded w-25 text-center">
                            ${player.Position}
                            <i class="bi bi-person-fill"></i>
                            </span>
                        <h5 class="text-light my-2 fs-6">
                            ${player.CategoryName}
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
                        <div class="form-check d-flex flex-column-reverse flex-lg-row p-0 justifiy-content-center align-items-center mt-3">
                            <h4 class="text-warning mx-2">تحديد اللاعب</h4>
                            <input class="form-check-input d-block mb-2 mx-auto my-1" type="checkbox" data-name="${player.PlayerName}" data-code="${player.id}" data-branchname="${player.BranchName}" value="" id="defaultCheck1">
                        </div>


                       
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

                if(inputPlayerName == ""){

                    PlayerInputFilter = true

                } else {

                    if(player.PlayerName.includes(inputPlayerName)){

                        PlayerInputFilter = true;

                    } else {

                        return;

                    }
                }


                if(PlayerInputFilter && GroupNameFilter && BranchNameFilter && CategoryNameFilter){

                    //  Log The Player Found
                    console.log(player);

                    // Plus Counter
                    counter += 1;

                    // Render Player
                    Area.innerHTML += playerHTML;

                } else {

                    console.log(PlayerInputFilter, GroupNameFilter, BranchNameFilter, CategoryNameFilter);
                }

            });

            if(counter < 1){

                Area.innerHTML = "";
                Swal.fire({
                icon: "info",
                title: "لا يوجد بيانات",
                confirmButtonText: "رجوع",
                 confirmButtonColor: "#e01a22",
                });
                Area.className.includes("d-none") ? null : Area.classList.add("d-none");
                counterHTML.className.includes("d-none") ? null : counterHTML.classList.add("d-none");
                console.log("no Data Found");


                 } else {

                HandleCheckBox();

                counterHTML.innerHTML = `عدد اللاعبين : ${counter}`;
                counterHTML.className.includes("d-none") ? counterHTML.classList.remove("d-none") :null;
            }

}


function HandleCheckBox(){

    let NamesArray = [];

    let checkboxes = document.querySelectorAll("input[type='checkbox']");
    let TextNames = document.querySelector("input#playernames");
    let counter = document.querySelector("h3#counter-select");
    let btnHdor = document.querySelector("button#btn-hdor");



    checkboxes.forEach(checkbox => {

        checkbox.addEventListener("click",(e)=>{

         let checked = document.querySelectorAll("input[type='checkbox']:checked");

            NamesArray = [];
            TextNames.value = "";

            if(checked.length > 0){

                checked.forEach(check =>{

                    let NameObj = {
                        playername: check.dataset.name,
                        id: check.dataset.code,
                        branchname: check.dataset.branchname
                    }

                    NamesArray.push(NameObj);

                });

                TextNames.value = JSON.stringify(NamesArray);
                counter.className.includes("d-none") ? counter.classList.remove("d-none")  : null;
                btnHdor.className.includes("d-none") ? btnHdor.classList.remove("d-none")  : null;
                counter.innerHTML = `العدد المحدد : ${NamesArray.length}`;
                
            } else {
                
                counter.className.includes("d-none") ?  null : counter.classList.add("d-none") ;
                btnHdor.className.includes("d-none") ? null : btnHdor.classList.add("d-none")  ;

            }
           
            console.log(NamesArray);
               
        })
    });
}




    
    let btn = document.querySelector("div#Search");
    
    btn.addEventListener("click",() => HandleSearch());
    


    let Input = document.querySelectorAll("input");


  


</script>

@endsection 