@extends('admin.layouts.master')

@section('title',"تسجيل نوع سيارة")
@section('icon',"bi bi-car-front-fill mx-1")


@section('content')

    
    <form action="{{ route('cartypes.store') }}" method="post" enctype="multipart/form-data" class="pb-4">
      @csrf
      @method("POST")

      
<div id="heading-area">
  <div class="container d-flex justify-content-lg-end justify-content-center  align-items-center" style="height: 70px">
    <h3 class="text-light">بيانات الماركة</h3>
  </div>
</div>

  <div class="player-data d-flex flex-column align-items-center flex-lg-row flex-lg-row-reverse mt-4" style="">


      <div class="container py-5">
        <div class="data-info row p-0 m-0 w-100 flex-row-reverse justify-content-center align-items-center">
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">ماركة السيارة</label>
            <input id="name" class="form-control w-100 text-center mx-auto" name="CarType" type="text" value="{{old('CarType')}}" placeholder="ماركة السيارة">
          </div>
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">نوع السيارة</label>
              <select class="form-control w-100 text-center mx-auto" name="CarType" >
                <option value="نقل أموال">نقل أموال</option>
                <option value="نقل أموال مصفحة">نقل أموال مصفحة</option>
                <option value="ميكروباص">ميكروباص</option>
                <option value="ملاكى">ملاكى</option>
                <option value="نصف نقل">نصف نقل</option>
                <option value="ربع نقل">ربع نقل</option>
                <option value="موتوسيكل">موتوسيكل</option>
              </select>
          </div>
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">صورة السيارة</label>
            <input class="form-control w-100 mx-auto" name="CarImg" type="file">
          </div>
          <div class="data-text  col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">نوع الفتيس</label>
              <select class="form-control w-100 text-center mx-auto" name="SollarType" >
                <option value="مانيوال">مانيوال</option>
                <option value="أوتوماتيك">أوتوماتيك</option>
              </select>
          </div>
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">نوع الوقود</label>
              <select class="form-control w-100 text-center mx-auto" name="SollarType" >
                <option value="سولار">سولار</option>
                <option value="بنزين 92">بنزين 92</option>
                <option value="بنزين 95">بنزين 95</option>
              </select>
          </div>
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">سنة الصنع</label>
            <input class="form-control w-100 text-center mx-auto" name="CarImg" placeholder="Ex. 2014" type="text">
          </div>
        </div>
      </div>

  </div>

        <div id="heading-area">
          <div class="container d-flex justify-content-lg-end justify-content-center  align-items-center" style="height: 70px">
            <h3 class="text-light">فرق تغيير قطع الغيار</h3>
          </div>
        </div>
  <div class="player-data d-flex flex-column align-items-center flex-lg-row flex-lg-row-reverse py-3">
    <div class="container">
      <div class="data-info row p-0 m-0 w-100 flex-row-reverse justify-content-start align-items-center">
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">لتر بنزين\كيلومتر</label>
          <input class="form-control w-100 text-center mx-auto" name="Sollar" value="{{old('Sollar')}}" type="text" placeholder="عدد الكيلوهات">
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">تغيير زيت\كيلومتر</label>
          <input class="form-control w-100 text-center mx-auto" name="Zeet" value="{{old('Zeet')}}" type="text" placeholder="عدد الكيلوهات">
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">تغيير فلتر هواء\كيلومتر</label>
          <input class="form-control w-100 text-center mx-auto" name="FilterH" value="{{old('FilterH')}}" type="text" placeholder="عدد الكيلوهات">
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">تغيير فلتر زيت\كيلومتر</label>
          <input class="form-control w-100 text-center mx-auto" name="FilterZ" value="{{old('FilterZ')}}" type="text" placeholder="عدد الكيلوهات">
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">تغيير سيور\كيلومتر</label>
          <input class="form-control w-100 text-center mx-auto" name="Sior" value="{{old('Sior')}}" type="text" placeholder="عدد الكيلوهات">
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">تغيير كاوتش\كيلومتر</label>
          <input class="form-control w-100 text-center mx-auto" name="Kawtsh" value="{{old('Kawtsh')}}" type="text" placeholder="عدد الكيلوهات">
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">تغيير دبرياج\كيلومتر</label>
          <input class="form-control w-100 text-center mx-auto" name="Dbryag" value="{{old('Dbryag')}}" type="text" placeholder="عدد الكيلوهات">
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">تغيير تيل فرامل\كيلومتر</label>
          <input class="form-control w-100 text-center mx-auto" name="Framel" value="{{old('Framel')}}" type="text" placeholder="عدد الكيلوهات">
        </div>

      </div>
    </div>
  </div>
      
        <button id="btn" type="submit" class="d-block btn add-player w-25 btn-danger text-light mx-auto d-block">تسجيل البيانات</button>
    
  
  
  

</form>

{{-- <script src="{{asset('includes/custom/js/newplayer.js')}}"></script> --}}


@section('script')
    
<script>

  // Focus
  window.onload = () =>{
    let inputs = document.querySelectorAll("input");
    let date = new Date().toISOString().split("T")[0];

    console.log(inputs);

    inputs[2].focus();

  }


  // Save Data Shortcut
document.addEventListener('keydown', (e) => {

  let form = document.querySelector("form");

  let newInputs = document.querySelectorAll("input");


  // 48 = 0 key
  // 32 = space key
  // 13 = Enter Key 

  if(e.ctrlKey && e.keyCode == 32) {

    form.submit();

  }


  if(e.keyCode == 13){
    e.preventDefault();
  }



});

</script>

@endsection 
    
@endsection