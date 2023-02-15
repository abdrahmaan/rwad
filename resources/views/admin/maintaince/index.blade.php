@extends('admin.layouts.master')


@section('title',"المصروفات")
    


@section('css')
    

@endsection


@section('content')
        
<div class="container">

    <div class="row flex-row-reverse justify-content-center m-0 p-0" style="min-height: 200px">
        <div class="data-date col-lg-5 col-10 mb-4">
            <h3 class="text-warning text-center mb-3">تاريخ البداية</h3>
            <input type="date" placeholder="إسم اللاعب ثلاثى" class="form-control text-center mx-auto w-50">
        </div>
        <div class="data-date col-lg-5 col-10 mb-4">
            <h3 class="text-warning text-center mb-3">تاريخ النهاية</h3>
            <input type="date" placeholder="إسم اللاعب ثلاثى" class="form-control text-center mx-auto w-50">
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
        <div class="data-filter col-10 col-lg-5 my-2">
            <h3 class="text-warning text-center mb-2">النوع</h3>
            <select class="form-control text-center" name="" id="">
            <option value="الكل">الكل</option>
            <option value="مرتبات">مرتبات</option>
            <option value="نثريات">نثريات</option>
            <option value="صيانة">صيانة</option>
            <option value="أدوات رياضية">أدوات رياضية</option>
                
            </select>
        </div>  
        <div class="data-btn col-9 col-lg-7">
            <div id="Search" class="btn btn-warning text-dark w-100 d-block mx-auto my-4">بحث</div>

        </div>
    </div>
</div>
    <div id="players-area" class="row  d-flex justify-content-center m-0 p-0" style="min-height: 300px">

        <table class="table table-dark table-striped  w-75 mx-auto text-center">
            <thead>
               <tr>
                <th>التعديلات</th>
                <th>المسؤول</th>
                <th>التاريخ</th>
                <th>الفرع</th>
                <th>النوع</th>
                <th>القيمة</th>
                <th>البيان</th>
               </tr>
            </thead>
            <tbody id="attendance-area">
            </tbody>
        </table>

</div>
    
@endsection




@section('script')
<script>
        
    fetch("http://ecoach.egy/api/admin/payouts/all")
    .then(res => res.json())
    .then(res =>{
        console.log(res);
        window.sessionStorage.setItem('payouts',JSON.stringify(res));

    });

    function HandleSearch() {

            // Inputs & Selects
            let dateSearch = document.querySelectorAll("input[type='date']");
            let StartDate = dateSearch[0].value;
            let EndDate = dateSearch[1].value;
            let select = document.querySelectorAll("select");
            let selectBranch = select[0].value;
            let selectType = select[1].value;
            let counterHTML = document.querySelector("h3#counter");

            // AreaPlayer
            let Area = document.querySelector("#attendance-area");


            // Filters Checkers
            let TypeFilter = false;
            let BranchNameFilter = false;



            // Counter & Total Amount
            let counter = 0;
            let TotalAmount = 0;

            let DefaultImagepath ='/includes/img/bg-section.jpg';

            // Start Filter Logic  
            Area.innerHTML = "";
            Area.className.includes("d-none") ? Area.classList.remove("d-none")  : null;

            let data = JSON.parse(window.sessionStorage.getItem('payouts'));


            data.forEach(payout => {  

                // console.log(player);
                let payoutHTML = `
                        <tr>
                            <td class="align-middle">
                             ${ window.localStorage.getItem("role") !== null ?
                                  ` 
                                 <form action="/admin/payouts/${payout.id}" method="POST" class="d-inline">
                                    @csrf
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }} 
                                    <button type="submit" class="btn btn-danger my-2">حذف</button>
                                </form>
                                
                                `: "X" }
                            </td>
                            <td class="fs-5 align-middle">${payout.User}</td>
                            <td class="fs-5 align-middle">${payout.created_at.split(":")[0].split("T")[0]}</td>
                            <td class="fs-5 align-middle">${payout.Branch}</td>
                            <td class="fs-5 align-middle">${payout.Type}</td>
                            <td class="fs-5 align-middle">${payout.Amount}</td>
                            <td class="fs-5 align-middle">${payout.Desc}</td>
                        </tr>
                `;  
  
  


                  ///2023-01-31T17:11:23.000000Z - Date Type


                let DatePlayerAttendance = payout.created_at.split(":")[0].split("T")[0];



                if(DatePlayerAttendance >= StartDate && DatePlayerAttendance <= EndDate){

                if(selectType == "الكل" ){
                    TypeFilter = true;

                } else {
                    if(selectType == payout.Type){

                        TypeFilter = true;


                    } else {

                        return;
                    }

                }


                if(selectBranch == "الكل" ){
                    BranchNameFilter = true;

                } else {
                    if(selectBranch == payout.Branch){
                        BranchNameFilter = true;
                    } else {

                        return;
                    }

                }

                if(TypeFilter && BranchNameFilter){

                    //  Log The Player Found

                    // Plus Counter
                    counter += 1;

                    // Plus Total

                    TotalAmount += Number(payout.Amount);

                    // Render Player
                    Area.innerHTML += payoutHTML;

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
                Area.className.includes("d-none") ? null : Area.classList.add("d-none");
                // counterHTML.className.includes("d-none") ? null : counterHTML.classList.add("d-none");
                console.log("no Data Found");
                
                
            } else {
                 TotalHTML = `
                 <tr>
                    <td class="fs-5 align-middle" style='direction: rtl' colspan=3>${TotalAmount} جنية</td>
                    <td class="fs-5 align-middle" colspan=4>المجموع</td>
                    </tr>
                    `;


                Area.innerHTML += TotalHTML;
                Area.className.includes("d-none") ? Area.classList.remove("d-none") : null;
            }

}
    


    
    let Dates = document.querySelectorAll("input[type='date']");

    StandardDate = new Date();
    Dates[0].value = StandardDate.toISOString().split("T")[0]
    Dates[1].value = StandardDate.toISOString().split("T")[0]

    let btn = document.querySelector("div#Search");
    
    btn.addEventListener("click",() => HandleSearch());
    
    </script>
@endsection