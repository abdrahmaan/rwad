@extends('admin.layouts.master')



@section('title',"مراجعة سولار")
@section('icon',"bi bi-fuel-pump mx-1")


@section('content')
   
        <div class="container mt-5">
            <form action="/admin/search/movments" method="post">
                @csrf
            <div class="row flex-row-reverse justify-content-center align-items-center m-0 p-0" style="min-height: 200px">
                <div class="data-name col-10 m-4">
                    <h3 class="text-light text-center mb-3">طباشيرى</h3>
                    <input type="text" name="Tabashery" placeholder="طباشيري أو رقم اللوحة" class="form-control text-center mx-auto w-50">
                </div>  
                <div class="col-10 d-flex justify-content-center" dir="rtl">
                <div class="data-name col-3 m-4">
                    <h3 class="text-light text-center mb-3">تاريخ البداية</h3>
                    <input type="date" name="StartDate" placeholder="طباشيري أو رقم اللوحة" class="form-control text-center mx-auto">
                </div>
                <div class="data-name col-3 m-4">
                    <h3 class="text-light text-center mb-3">تاريخ النهاية</h3>
                    <input type="date" name="EndDate" placeholder="طباشيري أو رقم اللوحة" class="form-control text-center mx-auto">
                </div>
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


                <div class="data-btn col-9 col-lg-7">
                    <button id="Search" class="btn btn-danger text-light w-50 d-block mx-auto my-4">بحث</button>

                </div>
            </div>
        </form>

        </div>

        @isset($Movments)
        @if (count($Movments) > 0)

            {{$counter = 0}}
                    
            @foreach ($Movments as $Movment)

                {{$counter += $Movment->Diff}}

            @endforeach
            
            <div class="container py-4 d-flex flex-column">
                <div class="card w-25 align-self-end my-3 border-0" style="" dir="rtl">
                    <div class="card-header border-0 bg-dark text-light">
                        <i class="bi bi-gear-wide-connected mx-1 p-0"></i>
                        إجمالى فرق العداد
                    </div>
                    <div class="card-body">
                        <h4>{{$counter}} كيلو متر</h4>
                    </div>
                </div>
                <table class="table table-dark text-center table-bordered" dir="rtl">
                    <thead>
                        <th>طباشيرى</th>
                        <th>رقم اللوحة</th>
                        <th>النوع</th>
                        <th>عداد الخروج</th>
                        <th>عداد الدخول</th>
                        <th>الفرق</th>
                        <th>الفرع</th>
                        <th>المسوؤل</th>
                        <th>التاريخ</th>
                        <th>التعديلات</th>
                    </thead>
                    <tbody>
                        @foreach ($Movments as $Movment)
                            <tr>
                                <td>{{$Movment->Tabashery}}</td>
                                <td>{{$Movment->PlateNumber}}</td>
                                <td>{{$Movment->CarType}}</td>
                                <td>{{$Movment->StartCounter}}</td>
                                <td>{{$Movment->EndCounter}}</td>
                                <td>{{$Movment->Diff}}</td>
                                <td>{{$Movment->BranchName}}</td>
                                <td>{{$Movment->op}}</td>
                                <td>{{$Movment->created_at}}</td>
                                <td class="d-flex justify-content-center">
                                    @if (session()->get('user-data')->Role == "Admin")
                                    <form action="/admin/movments/{{$Movment->id}}" method="POST">
                                        @csrf
                                        @method("delete")
                                        <button class="btn btn-danger" type="submit">حذف</button>
                                    </form>

                                    <a class="btn btn-success mx-2" href="/admin/movments/{{$Movment->id}}/edit">تعديل</a>
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
        let date = new Date().toISOString().split("T")[0];
        inputs[2].value = date;
        inputs[3].value = date;
      

          document.addEventListener("keydown",(e)=>{
              if(e.ctrlKey && e.keyCode == 13){
                form.submit();
              }
          })
        </script>          
@endsection