@extends('admin.layouts.master')



@section('title',"مراجعة حضور المدربين")


@section('content')
   


        <div class="container">

            <div class="row flex-row-reverse justify-content-center m-0 p-0" style="min-height: 200px">
                <div class="data-name col-10 mb-4">
                    <h3 class="text-warning text-center mb-3">إسم الكابتن</h3>
                    <input type="text" placeholder="إسم الكابتن " class="form-control text-center mx-auto w-50">
                </div>
                <div class="data-date col-lg-5 col-10 mb-4">
                    <h3 class="text-warning text-center mb-3">تاريخ البداية</h3>
                    <input type="date" placeholder="إسم اللاعب ثلاثى" class="form-control text-center mx-auto w-50">
                </div>
                <div class="data-date col-lg-5 col-10 mb-4">
                    <h3 class="text-warning text-center mb-3">تاريخ النهاية</h3>
                    <input type="date" placeholder="إسم اللاعب ثلاثى" class="form-control text-center mx-auto w-50">
                </div>
                
                <div class="data-filter col-10 col-lg-5 my-2">
                    <h3 class="text-warning text-center mb-2">المجموعة</h3>
                    <select class="form-control text-center" name="GroupName" id="">
                        @foreach ($Groups as $Group)
                        <option value="{{$Group->GroupName}} - {{$Group->Day}} - {{$Group->Time}}">{{$Group->GroupName}} - {{$Group->Day}} - {{$Group->Time}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="data-filter col-10 col-lg-5 my-2">
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


        <h3 id="counter" class="text-warning text-end pe-5 my-4 d-none">عدد اللاعبين : 6</h3>
        <h3 id="counter-select" class="text-success text-end pe-5 my-4 d-none">عدد المحدد : 6</h3> 
            <input id="playernames" hidden name="PlayerNames"  type="text">
            <button id="btn-hdor" type="submit" class="btn d-none btn-success d-block mx-auto w-25">حضور الكل</button>
            <div id="players-area" class="row  d-flex justify-content-center m-0 p-0" style="min-height: 300px">

                <table class="table table-dark  table-striped  w-75 mx-auto text-center">
                    <thead>
                       <tr>
                        <th>التعديلات</th>
                        <th>التاريخ</th>
                        <th>الحالة</th>
                        <th>المجموعة</th>
                        <th>الإسم</th>
                       </tr>
                    </thead>
                    <tbody id="attendance-area">
                    </tbody>
                </table>
    
        </div>

    {{-- </form> --}}

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
    #attendace-area{
        overflow-x: scroll;
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


    fetch("http://ecoach.egy/api/admin/attendance/captin")
    .then(res => res.json())
    .then(res =>{
        console.log(res);
        window.sessionStorage.setItem('attendance',JSON.stringify(res.data));

    });

    function HandleSearch() {

            // Inputs & Selects
            let dateSearch = document.querySelectorAll("input[type='date']");
            let StartDate = dateSearch[0].value;
            let EndDate = dateSearch[1].value;
            let select = document.querySelectorAll("select");
            let inputPlayerName = document.querySelectorAll("input")[0].value;
            let selectGroupName = select[0].value;
            let selectCategoryName = select[1].value;
            let selectBranch = select[1].value;
            let counterHTML = document.querySelector("h3#counter");

            // AreaPlayer
            let Area = document.querySelector("#attendance-area");


            // Filters Checkers
            let GroupNameFilter = false;
            let BranchNameFilter = false;
            let CaptinInputFilter = false;


            // Counter
            let counter = 0;

            let DefaultImagepath ='/includes/img/bg-section.jpg';

            // Start Filter Logic  
            Area.innerHTML = "";
            Area.className.includes("d-none") ? Area.classList.remove("d-none")  : null;

            let data = JSON.parse(window.sessionStorage.getItem('attendance'));

            //Data Names 
            Names = [];

            data.forEach(captin => {  

                // console.log(player);
                let captinHTML = `
                        <tr>
                            <td class="align-middle">
                                <form action="/admin/attendance/captin/${captin.id}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" data-c='{{$Group->id}}' class="btn btn-danger my-2">حذف</button>
                                </form>
                            </td>
                            <td class="fs-5 align-middle">${captin.created_at.split(":")[0].split("T")[0]}</td>
                            <td class="fs-5 align-middle">حضور</td>
                            <td class="fs-5 align-middle">${captin.GroupName}</td>
                            <td class="fs-5 align-middle">${captin.CaptinName}</td>
                        </tr>
                `;  
  
  
                  ///2023-01-31T17:11:23.000000Z - Date Type


                let DatePlayerAttendance = captin.created_at.split(":")[0].split("T")[0];



                if(DatePlayerAttendance >= StartDate && DatePlayerAttendance <= EndDate){

                if(selectGroupName == "الكل" ){
                    GroupNameFilter = true;

                } else {
                    if(selectGroupName == captin.GroupName){

                        GroupNameFilter = true;


                    } else {

                        return;
                    }

                }

                if(selectBranch == "الكل" ){
                    BranchNameFilter = true;

                } else {
                    if(selectBranch == captin.BranchName){
                        BranchNameFilter = true;
                    } else {

                        return;
                    }

                }

                if(inputPlayerName == ""){

                    CaptinInputFilter = true


                } else {

                    if(captin.CaptinName.includes(inputPlayerName)){

                        CaptinInputFilter = true;

                    } else {

                        return;

                    }
                }


                if(CaptinInputFilter && GroupNameFilter && BranchNameFilter ){

                    //  Log The Player Found

                    // Plus Counter

                   

                         counter += 1;
                        // Render Player
                        Area.innerHTML += captinHTML;


                }
                } 

                
           

            });

            if(counter < 1){

                Swal.fire({
                icon: "info",
                title: "لا يوجد بيانات",
                confirmButtonText: "رجوع",
                 confirmButtonColor: "#e01a22",
            })
                Area.innerHTML = "";
                // Area.className.includes("d-none") ? null : Area.classList.add("d-none");
                counterHTML.className.includes("d-none") ? null : counterHTML.classList.add("d-none");
                console.log("no Data Found");


                 } else {

                counterHTML.innerHTML = `عدد الحضور : ${counter}`;
                counterHTML.className.includes("d-none") ? counterHTML.classList.remove("d-none") :null;
            }

}
    


    
    let Dates = document.querySelectorAll("input[type='date']");

    StandardDate = new Date();
    Dates[0].value = StandardDate.toISOString().split("T")[0]
    Dates[1].value = StandardDate.toISOString().split("T")[0]

    let btn = document.querySelector("div#Search");
    
    btn.addEventListener("click",() => HandleSearch());
    


    let Input = document.querySelectorAll("input");


  


</script>

@endsection 