@extends('admin.layouts.master')

@section('title',"تسجيل صنف فى المحزن")
@section('icon',"bi bi-file-earmark-plus mx-1")
    


@section('content')

    
    <form action="{{ route('inventory.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      @method("POST")
     <div class="player-data d-flex flex-column align-items-center flex-lg-row flex-lg-row-reverse mt-4" style="min-height: calc(100vh - 90px);">


      <div class="container">
        <div class="data-info row p-0 m-0 w-100 flex-row-reverse justify-content-center align-items-center">

          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">التصنيف</label>
            <select class="form-control w-100 text-center mx-auto" name="CategName" id="">
                <option value="فلاتر">فلاتر</option>
                <option value="فا">فلاتر</option>
            </select>
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">نوع الغيار</label>
            <select class="form-control w-100 text-center mx-auto" name="GroupName" id="">
                <option value="فلاتر">فلتر هواء</option>
                <option value="فا">فلتر زيت</option>
            </select>
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">القيد</label>
            <select class="form-control w-100 text-center mx-auto" name="GroupName" id="">
                <option value="وارد">وارد</option>
                <option value="منصرف">منصرف</option>
            </select>
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">عدد\قطعة غيار</label>
            <input class="form-control w-100 text-center mx-auto" value="" name="Count" value="{{old('Count')}}" type="text" placeholder="">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">الفرع</label>
            <select class="form-control w-100 text-center mx-auto" name="GroupName" id="">
                <option value="القاهرة">القاهرة</option>
                <option value="الإسكندرية">الإسكندرية</option>
            </select>
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


let fakeData = [
  {
    PlateName: "أ ل ف - 456",
    Tabashery: "45",
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

    let form = document.querySelector("form");
    form.addEventListener("submit",(e)=>{
      e.preventDefault();
    });


    if(e.ctrlKey && e.keyCode == 13){


    let newInputs = document.querySelectorAll("input");

    let isFound =false;

    fakeData.forEach(car => {

      if(car.Tabashery == e.target.value){
        newInputs[3].value = car.PlateName;
        newInputs[4].value = car.CarType;
        newInputs[7].value = car.BranchName;
        newInputs[5].focus();
        isFound = true;
        return;
      } else {
        isFound = false;
      }

    });

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

        form.submit();

        console.log("hello");

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