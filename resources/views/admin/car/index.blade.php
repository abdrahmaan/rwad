@extends('admin.layouts.master')



@section('title',"بيانات السيارات")
@section('icon',"bi bi-car-front-fill")


@section('content')
   
        <div class="container mt-5">
            <form action="/admin/search/cars" method="post">
                @csrf
            <div class="row flex-row-reverse justify-content-center align-items-center m-0 p-0" style="min-height: 200px">
                <div class="data-name col-10 m-4">
                    <h3 class="text-light text-center mb-3">طباشيرى</h3>
                    <input type="text" name="Tabashery" placeholder="طباشيري أو رقم اللوحة" class="form-control text-center mx-auto w-50">
                </div>
                <div class="data-filter col-10 col-lg-3 my-2">
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
                <div class="data-filter col-10 col-lg-3 my-2">
                    <h3 class="text-light text-center mb-2">الفرع</h3>
                    <select class="form-control text-center" name="BranchName" id="">
                        <option value="الكل">الكل</option>
                        @foreach ($Branches as $Branch)
                        <option value="{{$Branch->BranchName}}">{{$Branch->BranchName}}</option>
                        @endforeach
                    </select>
                </div>



                <div class="data-name col-12 my-4 d-flex justify-content-center align-items-center">
                    <div class="bg-success p-1 rounded d-flex">
                     <h6 class="text-light   text-center mx-2">إستخراج البيانات إكسيل</h6>
                     <input type="radio" name="Export" placeholder="طباشيري أو رقم اللوحة" class="">
                    </div>
                 </div>

                <div class="data-name col-12 mb-4 d-flex justify-content-center align-items-center">
                    <div class="bg-warning p-1 rounded d-flex">
                     <h6 class="text-dark text-center mx-2">إستخراج تقرير فرع</h6>
                     <input type="radio" name="Export" placeholder="طباشيري أو رقم اللوحة" class="">
                    </div>
                 </div>

                <div class="data-btn col-9 col-lg-7">
                    <button id="Search" class="btn btn-danger text-light w-75 d-block mx-auto">بحث</button>

                </div>
            </div>
        </form>

        </div>

        @isset($Cars)
        @if (count($Cars) > 0)
                
            <div class="container py-4">
                <table class="table table-dark text-center table-bordered" dir="rtl">
                    <thead>
                        <th>طباشيرى</th>
                        <th>رقم اللوحة</th>
                        <th>النوع</th>
                        <th>العداد</th>
                        <th>رقم الشاسية</th>
                        <th>تاريخ الرخصة</th>
                        <th>الفرع</th>
                        <th>التعديلات</th>
                    </thead>
                    <tbody>
                        @foreach ($Cars as $car)
                            <tr>
                                <td>{{$car->Tabashery}}</td>
                                <td>{{$car->PlateNumber}}</td>
                                <td>{{$car->CarType}}</td>
                                <td>{{$car->SCounter}}</td>
                                <td>{{$car->ShasehNumber}}</td>
                                <td>{{$car->DateExpire}}</td>
                                <td>{{$car->BranchName}}</td>
                                <td class="d-flex justify-content-center">
                                    @if (session()->get('user-data')->Role == "Admin")
                                        <form action="/admin/cars/{{$car->id}}" method="POST">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-danger" type="submit">حذف</button>
                                        </form>
    
                                        <a class="btn btn-success mx-2 d-block" href="/admin/cars/{{$car->id}}/edit">تعديل</a>
                                    <a class="btn btn-warning text-dark d-block" href="/admin/cars/{{$car->id}}">ملف السيارة</a>
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