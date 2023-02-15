@extends('admin.layouts.master')


@section('title',"الإشتراكات")
    


@section('css')
    

@endsection


@section('content')
    
<div class="container">

    <div class="row flex-row-reverse justify-content-center m-0 p-0" style="min-height: 200px">
        <div class="data-name col-10 mb-4">
            <h3 class="text-warning text-center mb-3">إسم اللاعب</h3>
            <input type="text" placeholder="إسم اللاعب ثلاثى" class="form-control text-center mx-auto w-50">
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
                <option value="الكل">الكل</option>
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
    <div id="players-area" class="row  d-flex justify-content-center m-0 p-0" style="min-height: 300px">

        <table class="table table-dark table-striped  w-75 mx-auto text-center">
            <thead>
               <tr>
                <th>التعديلات</th>
                <th>التاريخ</th>
                <th>القيمة</th>
                <th>الفرع</th>
                <th>المجموعة</th>
                <th>الإسم</th>
               </tr>
            </thead>
            <tbody id="attendance-area">
            </tbody>
        </table>

</div>

@endsection




@section('script')
    <script>
        
    fetch("http://ecoach.egy/api/admin/payments/all")
    .then(res => res.json())
    .then(res =>{
        console.log(res);
        window.sessionStorage.setItem('payments',JSON.stringify(res));

    });

    function HandleSearch() {

            // Inputs & Selects
            let dateSearch = document.querySelectorAll("input[type='date']");
            let StartDate = dateSearch[0].value;
            let EndDate = dateSearch[1].value;
            let select = document.querySelectorAll("select");
            let inputPlayerName = document.querySelectorAll("input")[0].value;
            let selectGroupName = select[0].value;
            let selectBranch = select[1].value;
            let counterHTML = document.querySelector("h3#counter");

            // AreaPlayer
            let Area = document.querySelector("#attendance-area");


            // Filters Checkers
            let GroupNameFilter = false;
            let BranchNameFilter = false;
            let CategoryNameFilter = false;
            let PlayerInputFilter = false;


            // Counter & Total Amount
            let counter = 0;
            let TotalAmount = 0;

            let DefaultImagepath ='/includes/img/bg-section.jpg';

            // Start Filter Logic  
            Area.innerHTML = "";
            Area.className.includes("d-none") ? Area.classList.remove("d-none")  : null;

            let data = JSON.parse(window.sessionStorage.getItem('payments'));


            data.forEach(payment => {  

                // console.log(player);
                let paymentHTML = `
                        <tr>
                            <td class="align-middle">
                             ${ window.localStorage.getItem("role") !== null ?
                                  ` 
                                 <form action="/admin/payments/${payment.id}" method="POST" class="d-inline">
                                    @csrf
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }} 
                                    <button type="submit" class="btn btn-danger my-2">حذف</button>
                                </form>
                                
                                `: "X" }
                            </td>
                            <td class="fs-5 align-middle">${payment.created_at.split(":")[0].split("T")[0]}</td>
                            <td class="fs-5 align-middle" style='direction: rtl'>${payment.Amount} جنية</td>
                            <td class="fs-5 align-middle">${payment.Branch}</td>
                            <td class="fs-5 align-middle">${payment.GroupName}</td>
                            <td class="fs-5 align-middle">${payment.PlayerName}</td>
                        </tr>
                `;  
  
  


                  ///2023-01-31T17:11:23.000000Z - Date Type


                let DatePlayerAttendance = payment.created_at.split(":")[0].split("T")[0];



                if(DatePlayerAttendance >= StartDate && DatePlayerAttendance <= EndDate){

                if(selectGroupName == "الكل" ){
                    GroupNameFilter = true;

                } else {
                    if(selectGroupName == payment.GroupName){

                        GroupNameFilter = true;


                    } else {

                        return;
                    }

                }


                if(selectBranch == "الكل" ){
                    BranchNameFilter = true;

                } else {
                    if(selectBranch == payment.Branch){
                        BranchNameFilter = true;
                    } else {

                        return;
                    }

                }

                if(inputPlayerName == ""){

                    PlayerInputFilter = true


                } else {

                    if(payment.PlayerName.includes(inputPlayerName)){

                        PlayerInputFilter = true;

                    } else {

                        return;

                    }
                }


                if(PlayerInputFilter && GroupNameFilter && BranchNameFilter){

                    //  Log The Player Found

                    // Plus Counter
                    counter += 1;

                    // Plus Total

                    TotalAmount += Number(payment.Amount);

                    // Render Player
                    Area.innerHTML += paymentHTML;

                }
                } 

                
           

            });

            if(counter < 1){

                Swal.fire({
                icon: "info",
                title: "لا يوجد بيانات",
                confirmButtonText: "رجوع",
                 confirmButtonColor: "#e01a22",
                });
                Area.innerHTML = "";
                // Area.className.includes("d-none") ? null : Area.classList.add("d-none");
                // counterHTML.className.includes("d-none") ? null : counterHTML.classList.add("d-none");
                console.log("no Data Found");
                
                
            } else {
                 TotalHTML = `
                 <tr>
                    <td class="fs-5 align-middle" style='direction: rtl' colspan=3>${TotalAmount} جنية</td>
                    <td class="fs-5 align-middle" colspan=3>المجموع</td>
                    </tr>
                    <tr>
                    <td class="fs-5 align-middle" colspan=3>${counter}</td>
                    <td class="fs-5 align-middle" colspan=3>عدد الدفع</td>
                </tr>
                    `;


                Area.innerHTML += TotalHTML;
                Area.className.includes("d-none") ? Area.classList.remove("d-none") : null;
                // counterHTML.innerHTML = `عدد اللاعبين : ${counter}`;
                // counterHTML.className.includes("d-none") ? counterHTML.classList.remove("d-none") :null;
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