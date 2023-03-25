@extends('admin.layouts.master')



@section('title',"أنواع السيارات")
@section('icon',"bi bi-car-front-fill")


@section('content')
   
        <div class="container d-none mt-5">
            <form action="/admin/search/cars" method="post">
                @csrf
            <div class="row flex-row-reverse justify-content-center align-items-center m-0 p-0" style="min-height: 200px">
            
                <div class="data-filter col-10 col-lg-7 my-2">
                    <h3 class="text-light text-center mb-2">النوع</h3>
                    <select  class="form-control text-center" name="CarType">
                        <option value="الكل">الكل</option>
                        <option value="ميكروباص">ميكروباص</option>
                        <option value="نقل أموال">نقل أموال</option>
                        <option value="ملاكى">ملاكى</option>
                        <option value="نصف نقل">نصف نقل</option>
                        <option value="موتوسيكل">موتوسيكل</option>
                  
                    </select>
                </div>

                <div class="data-btn col-9 col-lg-7">
                    <button id="Search" class="btn btn-danger text-light w-75 d-block mx-auto">بحث</button>

                </div>
            </div>
        </form>

        </div>

        @isset($CarType)
        @if (count($CarType) > 0)
                
            <div class="container py-4 d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 90px)">
                <table class="table table-dark text-center table-bordered align-middle" dir="rtl">
                    <thead class="align-middle">
                        <th>#</th>
                        <th>نوع السيارة</th>
                        <th>نوع الوقود</th>
                        <th>سولار\كيلومتر</th>
                        <th>زيت\كيلومتر</th>
                        <th>فلتر زيت\كيلومتر</th>
                        <th>فلتر هواء\كيلومتر</th>
                        <th>سيور\كيلومتر</th>
                        <th>كاوتش\كيلومتر</th>
                        <th>دبرياج\كيلومتر</th>
                        <th>فرامل\كيلومتر</th>
                        <th>التعديلات</th>
                    </thead>
                    <tbody>
                        @foreach ($CarType as $car)
                            <tr>
                                <td class="px-3"><img src="/includes/car_imgs/{{$car->CarImg}}" width="70px"  alt=""></td>
                                <td>{{$car->CarType}}</td>
                                <td>{{$car->SollarType}}</td>
                                <td>{{$car->Sollar}}</td>
                                <td>{{$car->Zeet}}</td>
                                <td>{{$car->FilterZ}}</td>
                                <td>{{$car->FilterH}}</td>
                                <td>{{$car->Sior}}</td>
                                <td>{{$car->Kawtsh}}</td>
                                <td>{{$car->Dbryag}}</td>
                                <td>{{$car->Framel}}</td>
                                <td class="d-flex py-5 ">
                                    @if (session()->get('user-data')->Role == "Admin")
                                        <form action="/admin/cartypes/{{$car->id}}" method="POST">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-danger " type="submit">حذف</button>
                                        </form>
    
                                        <a class="btn btn-success mx-2 d-block" href="/admin/cartypes/{{$car->id}}/edit">تعديل</a>
                                    @else 

                                    X

                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @else 
        <script>
            Swal.fire({
              icon: "info",
              title: "! تنبيه",
              text: 'لا يوجد بيانات',
               confirmButtonText: "رجوع",
               confirmButtonColor: "#e01a22",
            })
          </script>
        @endif
        @endisset


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