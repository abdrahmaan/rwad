@extends('admin.layouts.master')



@section('title',"$Car->Tabashery ملف سيارة")
@section('icon',"bi bi-car-front-fill")


@section('content')

<div id="heading-area">
  <div class="container d-flex justify-content-lg-end justify-content-center  align-items-center" style="height: 70px">
    <h3 class="text-light">بيانات السيارة</h3>
  </div>
</div>

<div class="container d-flex flex-column align-items-end">

  <div class="row p-0 m-0 justify-content-start align-items-end w-100 flex-row-reverse">
    <div class="col-12 d-flex justify-content-center align-items-center">
      <img src="/includes/car_imgs/{{$Car->CarImg}}" class="align-self-center" width="300" alt="">

    </div>
    <div class="col-12 col-lg-6 m-0 p-0 d-flex flex-column justify-content-center align-items-end">
      <h2 id="shadow"  class="text-light my-3 text-end w-50" dir="rtl">
        طباشيري : 
        <br>
        <span class="text-warning">{{$Car->Tabashery}}</span>
      </h2>
    </div>
    <div class="col-12 col-lg-6 m-0 p-0 d-flex flex-column justify-content-center align-items-end">
      <h2 id="shadow"  class="text-light my-3 text-end w-50" dir="rtl">
        نوع السيارة : 
        <br>
        <span class="text-warning">{{$Car->CarType}}</span>
      </h2>
    </div>
    <div class="col-12 col-lg-6 m-0 p-0 d-flex flex-column justify-content-center align-items-end">
      <h2 id="shadow"  class="text-light my-3 text-end w-50" dir="rtl">
        رقم اللوحة : 
        <br>
        <span class="text-warning">{{$Car->PlateNumber}}</span>
      </h2>
    </div>
    <div class="col-12 col-lg-6 m-0 p-0 d-flex flex-column justify-content-center align-items-end">
      <h2 id="shadow"  class="text-light my-3 text-end w-50" dir="rtl">
        رقم الشاسية : 
        <br>
        <span class="text-warning">{{$Car->ShasehNumber}}</span>
      </h2>
    </div>
    <div class="col-12 col-lg-6 m-0 p-0 d-flex flex-column justify-content-center align-items-end">
      <h2 id="shadow"  class="text-light my-3 text-end w-50" dir="rtl">
        العداد الحالى : 
        <br>
        <span class="text-warning">{{$Car->SCounter}}</span>
      </h2>
    </div>
    <div class="col-12 col-lg-6 m-0 p-0 d-flex flex-column justify-content-center align-items-end">
      <h2 id="shadow"  class="text-light my-3 text-end w-50" dir="rtl">
        تاريخ إنتهاء الرخصة : 
        <br>
        <span class="text-warning">{{$Car->DateExpire}}</span>
      </h2>
    </div>

  </div>
   
</div>

<div id="heading-area" class="my-4">
  <div class="container d-flex justify-content-lg-end justify-content-center  align-items-center" style="height: 70px">
    <h3 class="text-light">بيانات المتابعة</h3>
  </div>
</div>


<div class="container d-flex flex-column align-items-end">

  <div class="row p-0 m-0 justify-content-start align-items-end w-100 flex-row-reverse">
    <div class="col-12 col-lg-6 m-0 p-0 d-flex flex-column justify-content-center align-items-end">
      <h2 id="shadow"  class="text-light my-3 text-end w-50" dir="rtl">
        تموين وقود : 
        <br>
        <span class="fs-4">المتبقى : <span  class="{{$Car->NextSollar - $Car->SCounter > 0 ? "text-warning" : "text-danger"}}">{{$Car->NextSollar - $Car->SCounter}} كيلومتر</span></span> 
        <br>
        <span class="fs-4">عداد : <span class="{{$Car->NextSollar - $Car->SCounter > 0 ? "text-warning" : "text-danger"}}">{{$Car->NextSollar}}</span></span> 
      </h2>
    </div>
    <div class="col-12 col-lg-6 m-0 p-0 d-flex flex-column justify-content-center align-items-end">
      <h2 id="shadow"  class="text-light my-3 text-end w-50" dir="rtl">
        تغيير زيت : 
        <br>
        <span class="fs-4">المتبقى : <span  class="text-warning">{{$Car->NextZet - $Car->SCounter}} كيلومتر</span></span> 
        <br>
        <span class="fs-4">عداد : <span class="text-warning">{{$Car->NextZet}}</span></span> 
      </h2>
    </div>
    <div class="col-12 col-lg-6 m-0 p-0 d-flex flex-column justify-content-center align-items-end">
      <h2 id="shadow"  class="text-light my-3 text-end w-50" dir="rtl">
        تغيير فلتر زيت : 
        <br>
        <span class="fs-4">المتبقى : <span  class="text-warning">{{$Car->NextFilterZ - $Car->SCounter}} كيلومتر</span></span> 
        <br>
        <span class="fs-4">عداد : <span class="text-warning">{{$Car->NextFilterZ}}</span></span> 
      </h2>
    </div>
    <div class="col-12 col-lg-6 m-0 p-0 d-flex flex-column justify-content-center align-items-end">
      <h2 id="shadow"  class="text-light my-3 text-end w-50" dir="rtl">
        تغيير فلتر هواء : 
        <br>
        <span class="fs-4">المتبقى : <span  class="text-warning">{{$Car->NextFilterH - $Car->SCounter}} كيلومتر</span></span> 
        <br>
        <span class="fs-4">عداد : <span class="text-warning">{{$Car->NextFilterH}}</span></span> 
      </h2>
    </div>
    <div class="col-12 col-lg-6 m-0 p-0 d-flex flex-column justify-content-center align-items-end">
      <h2 id="shadow"  class="text-light my-3 text-end w-50" dir="rtl">
        تغيير سيور : 
        <br>
        <span class="fs-4">المتبقى : <span  class="text-warning">{{$Car->NextSior - $Car->SCounter}} كيلومتر</span></span> 
        <br>
        <span class="fs-4">عداد : <span class="text-warning">{{$Car->NextSior}}</span></span> 
      </h2>
    </div>
    <div class="col-12 col-lg-6 m-0 p-0 d-flex flex-column justify-content-center align-items-end">
      <h2 id="shadow"  class="text-light my-3 text-end w-50" dir="rtl">
        تغيير كاوتش : 
        <br>
        <span class="fs-4">المتبقى : <span  class="text-warning">{{$Car->NextKawtsh - $Car->SCounter}} كيلومتر</span></span> 
        <br>
        <span class="fs-4">عداد : <span class="text-warning">{{$Car->NextKawtsh}}</span></span> 
      </h2>
    </div>
    <div class="col-12 col-lg-6 m-0 p-0 d-flex flex-column justify-content-center align-items-end">
      <h2 id="shadow"  class="text-light my-3 text-end w-50" dir="rtl">
        تغيير دبرياج : 
        <br>
        <span class="fs-4">المتبقى : <span  class="text-warning">{{$Car->NextDbryag - $Car->SCounter}} كيلومتر</span></span> 
        <br>
        <span class="fs-4">عداد : <span class="text-warning">{{$Car->NextDbryag}}</span></span> 
      </h2>
    </div>
    <div class="col-12 col-lg-6 m-0 p-0 d-flex flex-column justify-content-center align-items-end">
      <h2 id="shadow"  class="text-light my-3 text-end w-50" dir="rtl">
        تغيير تيل فرامل : 
        <br>
        <span class="fs-4">المتبقى : <span  class="text-warning">{{$Car->NextFramel - $Car->SCounter}} كيلومتر</span></span> 
        <br>
        <span class="fs-4">عداد : <span class="text-warning">{{$Car->NextFramel}}</span></span> 
      </h2>
    </div>


  </div>
   
</div>



<style>

#info-text{
  border-radius: 20px
}

</style>



@endsection 




@section('script')
    <script>
          let inputs = document.querySelectorAll("input");
          let form = document.querySelector("form");
          inputs[1].focus();


          document.addEventListener("keydown",(e)=>{
              if(e.ctrlKey && e.keyCode == 13){
                form.submit();
              }
          })
        </script>          
@endsection