@extends('admin.layouts.master')

@section('title',"تسجيل سيارة جديدة")
@section('icon',"bi bi-car-front-fill mx-1")


@section('content')

    
    <form action="{{ route('cars.store') }}" method="post" enctype="multipart/form-data">
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
            <input class="form-control w-100 text-center mx-auto" name="PlateNumber" value="{{old('PlateNumber')}}" type="text" placeholder="أ ل ف - 678">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">نوع السيارة</label>
            <select class=" w-100 text-center form-control mx-auto" name="CarType" name="" id="">
              <option value="ميكروباص">ميكروباص</option>
              <option value="نقل أموال">نقل أموال</option>
              <option value="ملاكى">ملاكى</option>
              <option value="نصف نقل">نصف نقل</option>
              <option value="موتوسيكل">موتوسيكل</option>
          </select>
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">عداد البداية</label>
            <input class="form-control w-100 text-center mx-auto" name="SCounter" value="{{old('SCounter')}}" type="number" placeholder="Ex. 567666">
          </div>
          <div class="data-text col-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">الفرع</label>
            <select class="w-100 text-center form-control mx-auto" name="BranchName" name="" id="">
              @isset($branches)
                @foreach ($branches as $branch)
  
                  <option value="{{$branch->BranchName}}">{{$branch->BranchName}}</option>
                    
                @endforeach
              @endisset
          </select>
          </div>
        <button type="submit" class="col-5 d-block btn add-player btn-danger text-light mt-4  mx-auto d-block">تسجيل البيانات</button>
  
        </div>
      </div>
      </div>
    
  
  
  

</form>

{{-- <script src="{{asset('includes/custom/js/newplayer.js')}}"></script> --}}


@section('script')
    
<script>

  // Focus
  window.onload = () =>{
    let inputs = document.querySelectorAll("input");

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