@extends('admin.layouts.master')



@section('title',"$id ملف سيارة")
@section('icon',"bi bi-car-front-fill")


@section('content')

<div id="heading-area">
  <div class="container d-flex justify-content-lg-end justify-content-center  align-items-center" style="height: 70px">
    <h3 class="text-light">بيانات السيارة</h3>
  </div>
</div>

<div class="container d-flex flex-column align-items-end">
    <img src="/includes/img/car-transfer.png" class="align-self-center" width="300" alt="">
    <h2  class="text-light my-3">طباشيري : 45</h2>
    <h2  class="text-light my-3">رقم اللوحة : أ ل ف - 445</h2>
    <h2  class="text-light my-3">الفرع : القاهرة</h2>
    <h2  class="text-light my-3">العداد الحالى : 5546488</h2>
</div>

<div id="heading-area" class="my-4">
  <div class="container d-flex justify-content-lg-end justify-content-center  align-items-center" style="height: 70px">
    <h3 class="text-light">عداد صيانة قطع الغيار و الوقود</h3>
  </div>
</div>

<div class="container d-flex flex-column align-items-end">
  <h2 id="info-text" class="text-light bg-danger px-3 p-2 my-3">
    تغيير زيت : 50 كيلو متر عداد 557878
    <i class="bi bi-fuel-pump mx-1"></i>
  </h2>
  <h2 id="info-text" class="text-light bg-danger px-3 p-2 my-3">
    تغيير فلتر زيت : 20 كيلو متر عداد 557878
    <i class="bi bi-fuel-pump mx-1"></i>
  </h2>
  <h2 id="info-text" class="text-light bg-danger px-3 p-2 my-3">تغيير فلتر هواء : 30 كيلو متر عداد 
    557878
    <i class="bi bi-fuel-pump mx-1"></i>
  </h2>
  <h2 id="info-text" class="text-light bg-danger px-3 p-2 my-3">
    تمويين وقود : 40 كيلو متر عداد 557878
    <i class="bi bi-fuel-pump mx-1"></i>

  </h2>

</div>


<style>

#info-text{
  border-radius: 20px
}
#heading-area{
    /* border-width: 3px 0 0 0; */
    /* border-color: white; */
    /* border-style: solid; */
    height: 70px !important;
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgb(32, 157, 182) 100%) !important; 

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