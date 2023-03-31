@extends('admin.layouts.master')

@section('title',"تسجيل صيانة")
@section('icon',"bi bi-gear-wide-connected mx-1")
    


@section('content')

    
    <form action="{{ route('maintainces.store') }}" method="post" enctype="multipart/form-data">
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
            <input class="form-control w-100 text-center mx-auto" name="PlateNumber" readonly value="{{old('PlateNumber')}}" type="text" placeholder="رقم اللوحة">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">نوع السيارة</label>
            <input class="form-control w-100 text-center mx-auto" name="CarType" readonly value="{{old('CarType')}}" type="text" placeholder="النوع">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">عداد الصيانة</label>
            <input class="form-control w-100 text-center mx-auto" data-tab="6" name="Counter"  value="{{old('Counter')}}" type="number" placeholder="Ex. 578929">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">رقم الغيار الأساسى</label>
            <input class="form-control w-100 text-center mx-auto" data-tab="7" name="Counter"  value="{{old('Counter')}}" type="number" placeholder="الرقم">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">رقم الغيار الثانوى</label>
            <input class="form-control w-100 text-center mx-auto" data-tab="8" name="Counter"  value="{{old('Counter')}}" type="number" placeholder="الرقم">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">الغيار الأساسى</label>
            <select class="form-control w-100 text-center mx-auto" name="CategName" id="">

            </select>
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">الغيار الثانوى</label>
            <select class="form-control w-100 text-center mx-auto" name="CategName" id="">
            
            </select>
          </div>
          <div class="data-text d-none col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">نوع الغيار</label>
            <select disabled class="form-control w-100 text-center mx-auto" name="GroupName" id="">
              <option value="زيت">زيت</option>
              <option value="فلتر زيت">فلتر زيت</option>
              <option value="فلاتر">فلتر هواء</option>
              <option value="سيور">سيور</option>
                <option value="كاوتش">كاوتش</option>
                <option value="تيل فرامل">تيل فرامل</option>
            </select>
          </div>
          <div class="data-text col-12 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">ملاحظات</label>
            <textarea class="form-control w-100 text-center mx-auto" name="Desc" value={{old("Desc")}} id="" placeholder="ملاحظات عن الصيانة"></textarea>
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">عدد\قطعة غيار</label>
            <input class="form-control w-100 text-center mx-auto"  name="Count" value="{{old('Count')}}" type="text" placeholder="العدد">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">الفرع</label>
            <input class="form-control w-100 text-center mx-auto" name="BranchName" value="{{old('BranchName')}}" type="text" placeholder="الفرع">
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


  // Focus And Fill Select CategName
  window.onload = () =>{

    let inputs = document.querySelectorAll("input");
    let selects = document.querySelectorAll("select");


    inputs[2].focus();


     // Start Fill  
      let fakeData = [
        {
          CategID: 1,
          CategName: "كهرباء",
          ProdID: 5,
          ProdName: "فيوز"
        },
        {
          CategID: 1,
          CategName: "كهرباء",
          ProdID: 3,
          ProdName: "أسلاك"
        },
        {
          CategID: 1,
          CategName: "كهرباء",
          ProdID: 5,
          ProdName: "ماتور"
        },
        {
          CategID: 2,
          CategName: "سيور",
          ProdID: 4,
          ProdName: "سير خلفى"
        },
        {
          CategID: 2,
          CategName: "سيور",
          ProdID: 6,
          ProdName: "سير أمامى"
        },
        {
          CategID: 2,
          CategName: "سيور",
          ProdID: 7,
          ProdName: "بطارية"
        }

      ]

    let Categ = [];
    selects[0].innerHTML = "";   

    fakeData.forEach(categ => {
        if(! Categ.includes(categ.CategName)){
          Categ.push(categ.CategName);
          let opt = `<option value="${categ.CategName}">${categ.CategName}</option>`
          selects[0].innerHTML += opt;    
        } 
    });



  }
  
  
  let form = document.querySelector("form");
  setInterval(() => {
    
    Events();

}, 1100);
 


function Events(){

  let inputs = document.querySelectorAll("input");
  let selects = document.querySelectorAll("select");
  let form = document.querySelector("form");
      
  let fakeData = [
    {
      CategID: 1,
      CategName: "كهرباء",
      ProdID: 1,
      ProdName: "فيوز"
    },
    {
      CategID: 1,
      CategName: "كهرباء",
      ProdID: 2,
      ProdName: "أسلاك"
    },
    {
      CategID: 1,
      CategName: "كهرباء",
      ProdID: 3,
      ProdName: "ماتور"
    },
    {
      CategID: 2,
      CategName: "سيور",
      ProdID: 1,
      ProdName: "سير خلفى"
    },
    {
      CategID: 2,
      CategName: "سيور",
      ProdID: 2,
      ProdName: "سير أمامى"
    },
    {
      CategID: 2,
      CategName: "سيور",
      ProdID: 3,
      ProdName: "بطارية"
    }

  ]



  // Click Enter On Tabashery
  inputs[2].addEventListener("keydown",(e)=>{


    if( e.keyCode == 13){

      e.preventDefault();
        let newInputs = document.querySelectorAll("input");
        let CarsData = JSON.parse(window.localStorage.getItem("cars"));
        let isFound = false;


        for(let i = 0; i < CarsData.length; i++) {
          
          if(CarsData[i].Tabashery == Number(e.target.value)){

              newInputs[3].value = CarsData[i].PlateNumber;
              newInputs[4].value = CarsData[i].CarType;
              newInputs[9].value = CarsData[i].BranchName;
              newInputs[5].focus();
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

  // Tabashery if null reset inputs
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


  // Click Enter On CategId
  inputs[6].addEventListener("keydown",(e)=>{

    // CategId Input = 6
    // ProdID Input = 7
    // CategName select = 0
    // ProdName select = 1


    let selects = document.querySelectorAll("select");

  
    if(e.keyCode == 13){

      e.preventDefault();
      let CategNames = [];

          selects[1].innerHTML = ``;
          inputs[7].value = "";


      for(let i = 0; i < fakeData.length; i++) {
        let Categ = fakeData[i];
        if(Categ.CategID == e.target.value){
          if(!CategNames.includes(Categ.CategName)){
            CategNames.push(Categ.CategName);
            selects[0].innerHTML = `<option value="${Categ.CategName}">${Categ.CategName}</option>`;
          }
        }
      }

    
    }



  });

  // Fill Select ProdName When Click CategName Select
  selects[0].addEventListener("mouseup",(e)=>{
    
    selects[1].innerHTML = ``;

    for(let i = 0; i < fakeData.length; i++) {

    let Categ = fakeData[i];
    if(Categ.CategName == selects[0].value){
      selects[1].innerHTML += `<option value="${Categ.ProdgName}">${Categ.ProdName}</option>`;
    }


}
  })
  // Click Enter On ProdID
  inputs[7].addEventListener("keydown",(e)=>{

    // CategId Input = 6
    // ProdID Input = 7
    // CategName select = 0
    // ProdName select = 1


    let selects = document.querySelectorAll("select");

    if(e.keyCode == 13){

      e.preventDefault();

      selects[1].innerHTML = ``;
      for(let i = 0; i < fakeData.length; i++) {

        let Categ = fakeData[i];
        if(Categ.ProdID == e.target.value && Categ.CategID == inputs[6].value){
          selects[1].innerHTML += `<option value="${Categ.ProdgName}">${Categ.ProdName}</option>`;
        }
        
      }
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