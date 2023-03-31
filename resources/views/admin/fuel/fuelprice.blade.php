@extends('admin.layouts.master')

@section('title',"أسعار الوقود")
@section('icon',"bi bi-car-front-fill mx-1")


@section('content')

    
    <form action="{{ route('cartypes.store') }}" method="post" enctype="multipart/form-data" class="pb-4">
      @csrf
      @method("POST")

        
      
    
            
<div id="heading-area">
  <div class="container d-flex justify-content-lg-end justify-content-center  align-items-center" style="height: 70px">
    <h3 class="text-light">تحكم فى سعر الوقود</h3>
  </div>
</div>

  <div class="player-data d-flex flex-column align-items-center flex-lg-row flex-lg-row-reverse " style="">


      <div class="container py-5">
        <div class="data-info row p-0 m-0 w-100 flex-row-reverse justify-content-center align-items-center">
     
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">نوع الوقود</label>
              <select class="form-control w-100 text-center mx-auto" name="CarType" >
                <option value="سولار">سولار</option>
                <option value="بنزين 92">بنزين 92</option>
                <option value="بنزين 95">بنزين 95</option>
  
              </select>
          </div>
          <div class="data-text col-11 col-lg-4 my-2 text-center mb-3">
            <label class="text-light fs-4 mb-2">السعر الجديد</label>
            <input id="name" class="form-control w-100 text-center mx-auto" name="CarType" type="text" value="{{old('CarType')}}" placeholder="سعر">
          </div>
         
        </div>
      </div>

  </div>
  
  <button id="btn" type="submit" class="d-block btn add-player w-25 btn-danger text-light mx-auto d-block">تسجيل البيانات</button>

  <div id="heading-area" class="mt-4">
    <div class="container d-flex justify-content-lg-end justify-content-center  align-items-center" style="height: 70px">
      <h3 class="text-light">تحكم فى سعر الوقود</h3>
    </div>
  </div>


  <div class="container py-4 d-flex flex-column">
    <table class="table table-dark text-center table-bordered" dir="rtl">
        <thead>

            <th>النوع</th>
            <th>السعر</th>

        </thead>
        <tbody>
                <tr>
                    <td>سولار</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>بنزين 92</td>
                    <td>10.15</td>
                </tr>
                <tr>
                    <td>بنزين 95</td>
                    <td>10.15</td>
                </tr>
        </tbody>
    </table>
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