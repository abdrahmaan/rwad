@extends('admin.layouts.master')



@section('title',"مراجعة الصيانات")
@section('icon',"bi bi-car-front-fill")


@section('content')
   
        <div class="container mt-5">
            <form action="/admin/search/maintainces" method="post">
                @csrf
            <div class="row flex-row-reverse justify-content-center align-items-center m-0 p-0" style="min-height: 200px">
                <div class="data-name col-10 m-4">
                    <h3 class="text-light text-center mb-3">طباشيرى</h3>
                    <input type="text" name="Tabashery" placeholder="طباشيري أو رقم اللوحة" class="form-control text-center mx-auto w-50">
                </div>  
                <div class="col-10 d-flex justify-content-center" dir="rtl">
                <div class="data-name col-3 m-4">
                    <h3 class="text-light text-center mb-3">تاريخ البداية</h3>
                    <input type="date" name="StartDate" placeholder="طباشيري أو رقم اللوحة" value="{{old("StartDate")}}" class="form-control text-center mx-auto">
                </div>
                <div class="data-name col-3 m-4">
                    <h3 class="text-light text-center mb-3">تاريخ النهاية</h3>
                    <input type="date" name="EndDate" placeholder="طباشيري أو رقم اللوحة" value="{{old("EndDate")}}" class="form-control text-center mx-auto">
                </div>
               </div>
             
                <div class="data-filter col-10 col-lg-3 my-2">
                    <h3 class="text-light text-center mb-2">النوع</h3>
                    <select class="form-control text-center" name="CarType" id="">
                        <option value="الكل">الكل</option>
                        @foreach ($CarTypes as $CarType)
                        <option value="{{$CarType->CarType}}">{{$CarType->CarType}}</option>
                        @endforeach
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

                <div class="data-name col-12   m-4 d-flex justify-content-center align-items-center">
                   <div class="bg-success p-1 rounded d-flex">
                    <h6 class="text-light   text-center mx-2">إستخراج البيانات إكسيل</h6>
                    <input type="checkbox" name="Export" placeholder="طباشيري أو رقم اللوحة" class="">
                   </div>
                </div>


                <div class="data-btn col-9 col-lg-7">
                    <button id="Search" class="btn btn-danger text-light w-50 d-block mx-auto my-4">بحث</button>

                </div>
            </div>
        </form>

        </div>


        @php
            if(isset($Data)){
                // dd($Data);
            }
        @endphp
        @isset($Data)

        @if (count($Data) > 0)

        </div>
            <div class="container py-4 d-flex flex-column">
                <div class="card w-25 align-self-end my-3 border-0" style="" dir="rtl">
                    <div class="card-header border-0 bg-dark text-light">
                        <i class="bi bi-gear-wide-connected mx-1 p-0"></i>
                        إجمالى فرق العداد
                    </div>
                    <div class="card-body">
                        {{-- <h4>{{$counter}} كيلو متر</h4> --}}
                    </div>
                </div>
                <table class="table table-dark text-center align-middle table-bordered" dir="rtl">
                    <thead>
                        <th>#</th>
                        <th>طباشيرى</th>
                        <th>رقم اللوحة</th>
                        <th>النوع</th>
                        <th>عداد الصيانة</th>
                        <th>نوع الغيار</th>
                        <th>العدد</th>
                        <th>ملاحظات</th>
                        <th>الفرع</th>
                        <th>المسوؤل</th>
                        <th>التاريخ</th>
                        <th>التعديلات</th>
                    </thead>
                    <tbody>
                        @foreach ($Data as $Maintaince)
                            <tr>
                                <td>
                                    <img src="/includes/car_imgs/{{$Maintaince->CarImg}}" width="70px" alt="">
                                </td>
                                <td>{{$Maintaince->Tabashery}}</td>
                                <td>{{$Maintaince->PlateNumber}}</td>
                                <td>{{$Maintaince->CarType}}</td>
                                <td>{{$Maintaince->Counter}}</td>
                                <td>{{$Maintaince->CategName}}</td>
                                <td>{{$Maintaince->Count}}</td>
                                <td>{{$Maintaince->Desc}}</td>
                                <td>{{$Maintaince->BranchName}}</td>
                                <td>{{$Maintaince->op}}</td>
                                <td>{{$Maintaince->created_at}}</td>
                                <td class="d-flex justify-content-center py-4">
                                    @if (session()->get('user-data')->Role == "Admin")
                                    <form action="/admin/maintainces/{{$Maintaince->id}}" method="POST">
                                        @csrf
                                        @method("delete")
                                        <button class="btn btn-danger" type="submit">حذف</button>
                                    </form>

                                    <a class="btn btn-success mx-2" href="/admin/maintainces/{{$Maintaince->id}}/edit">تعديل</a>
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
          let btn = document.querySelectorAll('button#Search')[0];
          let form = document.querySelector("form");
          inputs[1].focus();
        let date = new Date().toISOString().split("T")[0];
        inputs[2].value = date;
        inputs[3].value = date;
      

          document.addEventListener("keydown",(e)=>{
              if(e.ctrlKey && e.keyCode == 13){
                form.submit();
              }
          });

          inputs[4].addEventListener("click",(e)=>{
              if(e.target.checked == true){
                btn.innerText = "إستخراج"
              } else {
                btn.innerText = "بحث"

              }
          });

    </script>          
@endsection