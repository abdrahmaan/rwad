@extends('admin.layouts.master')

@section('title',"تسجيل سولار")
@section('icon',"bi bi-fuel-pump mx-1")
    


@section('content')

    
    <form action="{{ route('sollars.store') }}" method="post" enctype="multipart/form-data">
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
            <input class="form-control w-100 text-center mx-auto" name="PlateNumber" value="{{old('PlateNumber')}}" type="text" placeholder="">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">نوع السيارة</label>
            <input class="form-control w-100 text-center mx-auto" name="CarType" value="{{old('CarType')}}" type="text" placeholder="">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">عداد السيارة</label>
            <input class="form-control w-100 text-center mx-auto" name="Counter" value="{{old('Counter')}}" type="number" placeholder="">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">عدد الليترات</label>
            <input class="form-control w-100 text-center mx-auto" name="Liter" value="{{old('Liter')}}" type="number" placeholder="">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">سعر\لتر</label>
            <input class="form-control w-100 text-center mx-auto" name="CostLiter" value="{{old('CostLiter')}}" type="number" placeholder="">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">الإجمالى</label>
            <input class="form-control w-100 text-center mx-auto" name="Total" value="{{old('Total')}}" type="number" placeholder="">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">الفرع</label>
            <input class="form-control w-100 text-center mx-auto" name="BranchName" value="{{old('BranchName')}}" type="text" placeholder="">
          </div>

          <div class="databtn col-9">

          </div>
        <button type="submit" class="w-50 mx-auto d-block btn add-player btn-danger text-light mt-4  mx-auto d-block">تسجيل البيانات</button>
  
        </div>
      </div>
      </div>
    
  
  
  

</form>

{{-- <script src="{{asset('includes/custom/js/newplayer.js')}}"></script> --}}


@section('script')
    
<script>

  let Api = new API();

  Api.GetCarsData();

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
      
  // Click ctrl + Enter On Tabashery
  inputs[2].addEventListener("keydown",(e)=>{

    let form = document.querySelector("form");
    form.addEventListener("submit",(e)=>{
      e.preventDefault();
    });


    if(e.ctrlKey && e.keyCode == 13){


    let newInputs = document.querySelectorAll("input");

    let cars = JSON.parse(window.localStorage.getItem("cars"));
    let isFound =false;

    for (let i = 0; i < cars.length; i++) {

       if(cars[i].Tabashery == Number(e.target.value)){
        newInputs[3].value = cars[i].PlateNumber;
        newInputs[4].value = cars[i].CarType;
        newInputs[9].value = cars[i].BranchName;
        newInputs[5].focus();
        isFound = true;

        return;

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


  // Click ctrl + Enter On Sollar Price To Get Total
  inputs[7].addEventListener("keydown",(e)=>{
    if(e.ctrlKey && e.keyCode == 13){
      let newInputs = document.querySelectorAll("input");
      newInputs[8].value =  newInputs[7].value  *  newInputs[6].value;


    }
  });

  // Click ctrl + Enter On Sollar Price To Get Total
  inputs[6].addEventListener("keydown",(e)=>{

    if(e.ctrlKey && e.keyCode == 13){
      let newInputs = document.querySelectorAll("input");
      newInputs[8].value =  newInputs[7].value  *  newInputs[6].value;


    }
  });

  // Tabashery == Null When Change
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

  // Save Data Shortcut ctrl + space
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