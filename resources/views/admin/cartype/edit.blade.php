@extends('admin.layouts.master')

@section('title',"تعديل نوع سيارة")
@section('icon',"bi bi-car-front-fill mx-1")


@section('content')

    
    <form action="/admin/cartypes/{{$Car->id}}" method="post" enctype="multipart/form-data">
      @csrf
      @method("put")


      <div class="container pb-4">

        <div class="row m-0 p-0 justify-content-center align-items-center" style="min-height: 500px">
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">لتر بنزين\كيلومتر</label>
            <input class="form-control w-100 text-center mx-auto" name="Sollar" value="{{$Car->Sollar}}" type="text" placeh$Car->
          </div>
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">تغيير زيت\كيلومتر</label>
            <input class="form-control w-100 text-center mx-auto" name="Zeet" value="{{$Car->Zeet}}" type="text" placeh$Car->
          </div>
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">تغيير فلتر هواء\كيلومتر</label>
            <input class="form-control w-100 text-center mx-auto" name="FilterH" value="{{$Car->FilterH}}" type="text" placeh$Car->
          </div>
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">تغيير فلتر زيت\كيلومتر</label>
            <input class="form-control w-100 text-center mx-auto" name="FilterZ" value="{{$Car->FilterZ}}" type="text" placeh$Car->
          </div>
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">تغيير سيور\كيلومتر</label>
            <input class="form-control w-100 text-center mx-auto" name="Sior" value="{{$Car->Sior}}" type="text" placeh$Car->
          </div>
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">تغيير كاوتش\كيلومتر</label>
            <input class="form-control w-100 text-center mx-auto" name="Kawtsh" value="{{$Car->Kawtsh}}" type="text" placeh$Car->
          </div>
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">تغيير دبرياج\كيلومتر</label>
            <input class="form-control w-100 text-center mx-auto" name="Dbryag" value="{{$Car->Dbryag}}" type="text" placeh$Car->
          </div>
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">تغيير تيل فرامل\كيلومتر</label>
            <input class="form-control w-100 text-center mx-auto" name="Framel" value="{{$Car->Framel}}" type="text" placeh$Car->
          </div>

          
        </div>
        <button id="btn" type="submit" class="d-block btn add-player w-25 btn-danger text-light mt-4 mx-5  mx-auto d-block">تعديل البيانات</button>
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