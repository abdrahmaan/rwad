@extends('admin.layouts.master')

@section('title',"تسجيل نوع سيارة")
@section('icon',"bi bi-car-front-fill mx-1")


@section('content')

    
    <form action="{{ route('cartypes.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      @method("POST")
  <div class="player-data d-flex flex-column align-items-center flex-lg-row flex-lg-row-reverse mt-4" style="min-height: calc(100vh - 90px);">


      <div class="container pb-4">
        <div class="data-info row p-0 m-0 w-100 flex-row-reverse justify-content-center align-items-center">
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">نوع السيارة</label>
            <input id="name" class="form-control w-100 text-center mx-auto" name="CarType" type="text" value="{{old('CarType')}}" placeholder="نوع السيارة">
          </div>
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">صورة السيارة</label>
            <input class="form-control w-100 mx-auto" name="CarImg" type="file">
          </div>
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">نوع الوقود</label>
              <select class="form-control w-100 text-center mx-auto" name="SollarType" >
                <option value="سولار">سولار</option>
                <option value="بنزين">بنزين</option>
              </select>
          </div>
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
        <button id="btn" type="submit" class="d-block btn add-player w-25 btn-danger text-light mt-4 mx-5  mx-auto d-block">تسجيل البيانات</button>
      </div>
      </div>
    
  
  
  

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