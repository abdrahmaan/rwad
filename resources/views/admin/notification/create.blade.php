@extends('admin.layouts.master')

@section('title',"إرسال إشعار للموظفين")
@section('icon',"bi bi-car-front-fill mx-1")


@section('content')

    
    <form action="/admin/notifications-send" method="post" enctype="multipart/form-data" class="pb-4">
      @csrf
      @method("POST")


  <div class="player-data d-flex flex-column align-items-center mt-5" style="">


          <div class="data-text col-11 col-lg-6 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">المسمى الوظيفى</label>
              <select class="form-control w-100 text-center mx-auto" name="Roles" >
                <option value="الكل">الكل</option>
                <option value="Admin">Admin</option>
                <option value="المدير المالى">المدير المالى</option>
                <option value="مدير إدخال بيانات">مدير إدخال بيانات</option>
                <option value="مدخل بيانات">مدخل بيانات</option>
                <option value="مسؤول مخزن">مسؤول مخزن</option>
                <option value="مشتريات">مشتريات</option>
                <option value="مدير الحركة">مدير الحركة</option>
              </select>
          </div>
          <div class="data-text col-11 col-lg-6 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">عنوان الإشعار</label>
            <input class="form-control w-100 text-center mx-auto" name="Title" type="text" placeholder="العنوان">
          </div>
          <div class="data-text col-11 col-lg-6 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">محتوى الإشعار</label>
            <input class="form-control w-100 text-center mx-auto" name="Body" placeholder="المحتوى" type="text" style="min-height: 60px">
          </div>
        </div>
      </div>


        <button id="btn" type="submit" class="d-block btn add-player w-25 btn-danger my-3 text-light mx-auto d-block">إرسال الإشعار</button>
    
  
  
  

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