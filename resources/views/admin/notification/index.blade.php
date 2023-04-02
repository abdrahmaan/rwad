@extends('admin.layouts.master')



@section('title',"الإشعارات")
@section('icon',"bi bi-bell-fill")


@section('content')
   
        <div class="container mt-5">
            
            <form action="/admin/search/cars" method="post">
                @csrf
            <div class="row flex-row-reverse justify-content-center align-items-center m-0 p-0" style="min-height: 200px">
                <div class="data-name col-12 col-lg-3 m-4">
                    <h3 class="text-light text-center mb-3">تاريخ البداية</h3>
                    <input type="date" name="StartDate" placeholder="طباشيري أو رقم اللوحة" value="{{old("StartDate")}}" class="form-control text-center mx-auto">
                </div>
                <div class="data-name col-12 col-lg-3 m-4">
                    <h3 class="text-light text-center mb-3">تاريخ النهاية</h3>
                    <input type="date" name="EndDate" placeholder="طباشيري أو رقم اللوحة" value="{{old("EndDate")}}" class="form-control text-center mx-auto">
                </div>
                <div class="data-filter col-12 col-lg-5 my-2 m-4 align-self-center">
                    <h3 class="text-light text-center mb-2">الفرع</h3>
                    <select class="form-control text-center mx-auto" name="BranchName" id="">
                        <option value="الكل">الكل</option>
                        @foreach ($Branches as $Branch)
                        <option value="{{$Branch->BranchName}}">{{$Branch->BranchName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="data-name col-12 my-4 d-flex justify-content-center align-items-center">
                    <div class="bg-success p-1 rounded d-flex">
                     <h6 class="text-light   text-center mx-2">إستخراج البيانات إكسيل</h6>
                     <input type="checkbox" name="Export" placeholder="طباشيري أو رقم اللوحة" class="">
                    </div>
                 </div>


                <div class="data-btn col-9 col-lg-7">
                    <button id="Search" class="btn btn-danger text-light w-75 d-block mx-auto">بحث</button>

                </div>
               </div>
              



         
            </div>
        </form>

        </div>

        {{-- @isset($Cars) --}}
        {{-- @if (count($Cars) > 0) --}}
                
            <div class="container py-4">
                <table class="table table-dark table-striped text-center table-bordered align-middle" dir="rtl">
                    <thead>
                        <th>#</th>
                             <th>الفرع</th>
                             <th>طباشيرى</th>
                             <th>رقم اللوحة</th>
                             <th>الإشعار</th>
                             <th>البيان</th>
                             <th>المسؤول</th>
                             <th>الوقت</th>
                             <th>التعديلات</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="/includes/img/car-transfer.png" width="70px" alt="">
                            </td>
                            <td>القاهرة</td>
                            <td>45</td>
                            <td>أ ل ق - 467</td>
                            <td>تغيير (فتر زيت) مبكر</td>
                            <td>تغيير مبكر 50 كيلو عن عداد 785412</td>
                            <td>كريم غانم</td>
                            <td>15-03-2023</td>
                            <td>
                            <a class="btn btn-danger mx-2" href="/admin/movments//edit">حذف</a>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        {{-- @else 
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
        @endisset --}}



@endsection 



@section('script')


    <script>
         let inputs = document.querySelectorAll("input");
          let btn = document.querySelectorAll('button#Search')[0];
          let form = document.querySelector("form");
          inputs[1].focus();
         let date = new Date().toISOString().split("T")[0];
        inputs[1].value = date;
        inputs[2].value = date;
          inputs[1].focus();


          document.addEventListener("keydown",(e)=>{
              if(e.ctrlKey && e.keyCode == 13){
                form.submit();
              }
          })
        </script>          
@endsection