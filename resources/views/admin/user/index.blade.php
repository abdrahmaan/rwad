@extends('admin.layouts.master')


@section('content')

<form action="/admin/newuser"  method="post" class="mb-5">
    @method("POST")
      @csrf
    <div class="group-data d-flex flex-column align-items-center justify-content-center mt-4" style="min-height: calc(100vh - 180px);">
      <div class="group-info row w-100 d-flex flex-column justify-content-center align-items-center">
        <div class="data-text col-12 col-lg-7 text-center mb-3">
          <label class="text-light fs-4 mb-2">الإسم</label>
          <input id="name" class="form-control w-50 text-center mx-auto" name="FullName" value="{{old('FullName')}}" type="text" placeholder="إسم صاحب الحساب">
        </div>
       
        <div class="data-text col-12 col-lg-7 text-center mb-3">
          <label class="text-light fs-4 mb-2">Username</label>
          <input id="name" class="form-control w-50 text-center mx-auto" name="Username" value="{{old('Username')}}" type="text" placeholder="Username">

        </div>
        <div class="data-text col-12 col-lg-7 text-center mb-3">
          <label class="text-light fs-4 mb-2">Password</label>
          <input class="form-control w-50 text-center mx-auto" type="password" name="Password" value="{{old('Password')}}" placeholder="Password" >
        </div>
        <div class="data-text col-12 col-lg-7 text-center mb-3">
          <label class="text-light fs-4 mb-2">التحكم</label>
          <select class="w-50 text-center form-control mx-auto" name="Role" name="" id="">
            <option value="Admin">Admin</option>
            <option value="مدير إدخال بيانات">مدير إدخال بيانات</option>
            <option value="مدخل بيانات">مدخل بيانات</option>
            <option value="مسؤول مخزن">مسؤول مخزن</option>
            <option value="مشتريات">مشتريات</option>
            <option value="مدير الحركة">مدير الحركة</option>
          </select>
        </div>
  
       
      </div>
  
      <button id="btn"  type="submit" class="btn add-group  btn-danger text-light mt-4  w-25 mx-auto d-block">تسجيل الحساب</button>
     
    </div>


  

</form>


<div class="container py-4">
  <table class="table table-dark w-75 mx-auto table-bordered align-middle text-center py-5">
    <thead>
      <tr>
          <th scope="col">التغييرات</th>
          <th scope="col">الصلاحية</th>
          <th scope="col">إسم المستخدم</th>
        <th scope="col">إسم الحساب</th>
       
      </tr>
    </thead>
    <tbody>
        @foreach ($Users as $User)
            <tr>
                <td>
                    <form action="/admin/deleteuser/{{$User->id}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                </td>
                <td>{{$User->Role}}</td>
                <td>{{$User->Username}}</td>
                <td>{{$User->FullName}}</td>
            </tr>
        @endforeach
    </tbody>
</table>  
</div>
@endsection

@section('title', "إضافة حساب جديد")
    
