@extends('admin.layouts.master')

@section('title',"تسجيل سيارة جديدة")
@section('icon',"bi bi-car-front-fill mx-1")


@section('content')

    
    <form action="{{ route('cars.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      @method("POST")

    

  <div id="heading-area">
    <div class="container d-flex justify-content-lg-end justify-content-center  align-items-center" style="height: 70px">
      <h3 class="text-light">بيانات السيارة</h3>
    </div>
  </div>
  
  <div class="player-data d-flex flex-column align-items-center flex-lg-row flex-lg-row-reverse my-4">


    <div class="container">
      <div class="data-info row p-0 m-0 w-100 flex-row-reverse justify-content-center align-items-center">
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">طباشيرى</label>
          <input id="name" class="form-control w-100 text-center mx-auto" name="Tabashery" type="text" value="{{old('Tabashery')}}" placeholder="طباشيرى">
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">ماركة السيارة</label>
          <select class="w-100 text-center form-control mx-auto" name="CarType" name="" id="">
            <option value="ميتسوبيشي">ميتسوبيشي</option>
            <option value="شيفورلية">شيفورلية</option>
            <option value="دايو">دايو</option>
        </select>
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">نوع السيارة</label>
          <select class="w-100 text-center form-control mx-auto" name="CarType" name="" id="">
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
          <label class="text-light fs-4 mb-2">سنة الصنع</label>
          <select class="w-100 text-center form-control mx-auto" name="CarType" name="" id="">
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2016">2015</option>
        </select> 
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">رقم اللوحة</label>
          <input class="form-control w-100 text-center mx-auto" name="PlateNumber" value="{{old('PlateNumber')}}" type="text" placeholder="أ ل ف - 678">
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">اللون</label>
          <select class="w-100 text-center form-control mx-auto" name="CarType" name="" id="">
            <option value="أبيض">أبيض</option>
            <option value="أسود">أسود</option>
            <option value="أزرق">أزرق</option>
            <option value="رصاصى">رصاصى</option>
            <option value="بنى">بنى</option>
            <option value="برتقالى">برتقالى</option>
        </select> 
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">رقم الشاسية</label>
          <input class="form-control w-100 text-center mx-auto" name="ShasehNumber" value="{{old('ShasehNumber')}}" type="text" placeholder="Ex. 5728928EIJ829">
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">رقم الماتور</label>
          <input class="form-control w-100 text-center mx-auto" name="ShasehNumber" value="{{old('ShasehNumber')}}" type="text" placeholder="Ex. 5728928EIJ829">
        </div>

        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">عداد البداية</label>
          <input class="form-control w-100 text-center mx-auto" name="SCounter" value="{{old('SCounter')}}" type="number" placeholder="Ex. 567666">
        </div>

        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">تاريخ الشراء</label>
          <input class="form-control w-100 text-center mx-auto" name="PlateNumber" value="{{old('PlateNumber')}}" type="date" placeholder="أ ل ف - 678">
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">تاريخ بداية الترخيص</label>
          <input class="form-control w-100 text-center mx-auto" name="PlateNumber" value="{{old('PlateNumber')}}" type="date" placeholder="أ ل ف - 678">
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">تاريخ إنتهاء الترخيص</label>
          <input class="form-control w-100 text-center mx-auto" name="PlateNumber" value="{{old('PlateNumber')}}" type="date" placeholder="أ ل ف - 678">
        </div>



    
      </div>
    </div>
</div>

  <div id="heading-area">
    <div class="container d-flex justify-content-lg-end justify-content-center py-3 align-items-center" style="height: 70px">
      <h3 class="text-light">بيانات العمل</h3>
    </div>
  </div>
  
  <div class="player-data d-flex flex-column align-items-center flex-lg-row flex-lg-row-reverse" style="">


    <div class="container py-4">
      <div class="data-info row p-0 m-0 w-100 flex-row-reverse justify-content-center align-items-center"> 
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">الفرع</label>
          <select class="w-100 text-center form-control mx-auto" name="BranchName" name="" id="">
            @isset($branches)
              @foreach ($branches as $branch)

                <option value="{{$branch->BranchName}}">{{$branch->BranchName}}</option>
                  
              @endforeach
            @endisset
        </select>
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">تاريخ العمل</label>
          <input id="name" class="form-control w-100 text-center mx-auto" name="Tabashery" type="date" value="{{old('Tabashery')}}" placeholder="طباشيرى">
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">خزينة الصرف</label>
          <select class="w-100 text-center form-control mx-auto" name="CarType" name="" id="">
            <option value="خزينة القاهرة">خزينة القاهرة</option>
            <option value="خزينة المنصورة">خزينة المنصورة</option>
            <option value="خزينة الغردقة">خزينة الغردقة</option>
        </select>
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">حالة التأمين</label>
          <select class="w-100 text-center form-control mx-auto" name="CarType" name="" id="">
            <option value="مؤمن">مؤمن</option>
            <option value="غير مؤمن">غير مؤمن</option>
            <option value="جاى التامين">جارى التأمين</option>
        </select>
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">شركة التأمين</label>
          <input class="form-control w-100 text-center mx-auto" name="PlateNumber" value="{{old('PlateNumber')}}" type="text" placeholder="إسم الشركة">
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">تاريخ بداية التأمين</label>
          <input class="form-control w-100 text-center mx-auto" name="PlateNumber" value="{{old('PlateNumber')}}" type="date" placeholder="أ ل ف - 678">
        </div>
        <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
          <label class="text-light fs-4 mb-2">تاريخ نهاية التأمين</label>
          <input class="form-control w-100 text-center mx-auto" name="PlateNumber" value="{{old('PlateNumber')}}" type="date" placeholder="أ ل ف - 678">
        </div>
      </div>
      <button id="btn" type="submit" class="  w-25 d-block btn add-player btn-danger text-light mt-4  mx-auto d-block">تسجيل البيانات</button>
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