@extends('admin.layouts.master')

@section('title',"تسجيل حركة يومية")
@section('icon',"bi bi-file-earmark-plus mx-1")
    


@section('content')

    
    <form action="{{ route('movments.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      @method("POST")
     <div class="player-data d-flex flex-column align-items-center flex-lg-row flex-lg-row-reverse mt-4" style="min-height: calc(100vh - 90px);">


      <div class="container">
        <div class="data-info row p-0 m-0 w-100 flex-row-reverse justify-content-center align-items-center">
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">طباشيرى</label>
            <input id="name" class="form-control w-100 text-center mx-auto" name="Tabashery" type="text" value="{{old('Tabashery')}}" placeholder="طباشيرى">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">رقم اللوحة</label>
            <input class="form-control w-100 text-center mx-auto" readonly name="PlateNumber" value="{{old('PlateNumber')}}" type="text" placeholder="">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">نوع السيارة</label>
            <input class="form-control w-100 text-center mx-auto" readonly name="CarType" value="{{old('PlateNumber')}}" type="text" placeholder="">
          </div>

          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">عداد الخروج</label>
            <input class="form-control w-100 text-center mx-auto" readonly name="StartCounter" value="{{old('StartCounter')}}" type="number" placeholder="">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">عداد الدخول</label>
            <input class="form-control w-100 text-center mx-auto" name="EndCounter" value="{{old('EndCounter')}}" type="number" placeholder="">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">الفرق</label>
            <input class="form-control w-100 text-center mx-auto" readonly name="Diff" value="{{old('Diff')}}" type="number" placeholder="">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">الفرع</label>
            <input class="form-control w-100 text-center mx-auto" readonly name="BranchName" value="{{old('BranchName')}}" type="text" placeholder="">
          </div>

          <div class="databtn col-9">

          </div>
        <button  class="w-50 mx-auto d-block btn add-player btn-danger text-light mt-4  mx-auto d-block">تسجيل البيانات</button>
  
        </div>
      </div>
      </div>
    
  
  
  

</form>

{{-- <script src="{{asset('includes/custom/js/newplayer.js')}}"></script> --}}


@section('script')
    
<script>


  fetch("http://alrwad.abdelrahmaan.com/api/admin/cars")
  .then(res => res.json())
  .then(res => {
      window.localStorage.setItem("cars",JSON.stringify(res));
  })

let fakeData = [
  {
    PlateNumber: "أ ل ف - 456",
    Tabashery: 45,
    CarType: "نقل اموال",
    SCounter: "567888",
    BranchName: "القاهرة",
  }
];


  // Focus
  window.onload = () =>{

    let inputs = document.querySelectorAll("input");

    console.log(inputs);

    inputs[2].focus();
    
    
  }
  
  
  let form = document.querySelector("form");
  setInterval(() => {
    
    Events();

}, 1100);
 


function Events(){

  let inputs = document.querySelectorAll("input");
  let form = document.querySelector("form");
      
  // Click Enter On Tabashery
  inputs[2].addEventListener("keydown",(e)=>{


    if(e.ctrlKey && e.keyCode == 13){


    let newInputs = document.querySelectorAll("input");
    let CarsData = JSON.parse(window.localStorage.getItem("cars"));
    let isFound = false;


    for(let i = 0; i < CarsData.length; i++) {
      
      if(CarsData[i].Tabashery == Number(e.target.value)){

          newInputs[3].value = CarsData[i].PlateNumber;
          newInputs[4].value = CarsData[i].CarType;
          newInputs[5].value = CarsData[i].SCounter;
          newInputs[8].value = CarsData[i].BranchName;
          newInputs[6].focus();
          isFound = true;
          break;

          } else {

          isFound = false;
      }
    }


    if(isFound == false){
        
    newInputs[2].value = "";
    newInputs[3].value = "";
    newInputs[4].value = "";
    newInputs[5].value = "";
    newInputs[6].value = "";
    newInputs[7].value = "";
    newInputs[2].focus();
    Swal.fire({
    icon: "info",
    title: "لا يوجد سيارة بهذا الرقم",
    confirmButtonText: "رجوع",
          confirmButtonColor: "#e01a22",
    });
    e.target.value = "";
    }


    }
  });

  // Click Enter On EndConter 
  inputs[6].addEventListener("keydown",(e)=>{
      
    let form = document.querySelector("form");

    form.addEventListener("submit",(e)=>{


      e.preventDefault();

    });


    if(e.ctrlKey && e.keyCode == 13){


    let newInputs = document.querySelectorAll("input");

    newInputs[7].value = Number(e.target.value) - Number(newInputs[5].value);

    }
  });

  // Tabashery == Null
  inputs[2].addEventListener("change",(e)=>{

    if(e.target.value == ""){


    let newInputs = document.querySelectorAll("input");

      
    newInputs[2].value = "";
    newInputs[3].value = "";
    newInputs[4].value = "";
    newInputs[5].value = "";
    newInputs[6].value = "";
    newInputs[7].value = "";
    newInputs[2].focus();


    }
  });

  // Save Data Shortcut
  document.addEventListener('keydown', (e) => {

      let form = document.querySelector("form");

      let newInputs = document.querySelectorAll("input");


      // 48 = 0 key
      // 32 = space key
      
      if(e.ctrlKey && e.keyCode == 32) {

        console.log(newInputs[7].value);
        form.submit();

      }

      
      if(e.keyCode == 13){
        e.preventDefault();
      }



  });


  // Prevent Form Submit

  form.addEventListener("submit",(e)=>{
    e.preventDefault();
  })

  // Button Form Submit
  document.addEventListener("click", (e)=>{
    
    let btn = document.querySelector('button[type="submit"]');
    let newInputs = document.querySelectorAll("input");
    let form = document.querySelector("form");



    if(e.target.className == "w-50 mx-auto d-block btn add-player btn-danger text-light mt-4  mx-auto d-block"){

            form.submit();
    }

  });

}

</script>

@endsection 
    
@endsection