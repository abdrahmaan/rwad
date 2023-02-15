@extends('admin.layouts.master')

@section('title',"تعديل مجموعة")


@section('content')

    <form action="/admin/groups/{{$Group->id}}" method="post">
      @csrf
      @method("PUT")
        @csrf
      <div class="group-data d-flex flex-column align-items-center justify-content-center mt-4" style="min-height: calc(100vh - 180px);">
        <div class="group-info w-50 d-flex flex-column justify-content-center align-items-center">
          <div class="data-text w-100 text-center mb-3">
            <label class="text-warning fs-4 mb-2">إسم المجموعة</label>
            <input id="name" class="form-control w-50 text-center mx-auto" value='{{$Group->GroupName}}' name="GroupName" type="text" placeholder="إسم المجموعة">
          </div>
         
          <div class="data-text w-100 text-center mb-3">
            <label class="text-warning fs-4 mb-2">اليوم</label>
            <select class="w-50 text-center form-control mx-auto" value='{{$Group->Day}}'  name="Day" id="">
              <option value="السبت">السبت</option>
              <option value="الأحد">الأحد</option>
              <option value="الإثنين">الإثنين</option>
              <option value="الثلاثاء">الثلاثاء</option>
              <option value="الأربعاء">الأربعاء</option>
              <option value="الخميس">الخميس</option>
              <option value="الجمعة">الجمعة</option>
            </select>
          </div>
          <div class="data-text w-100 text-center mb-3">
            <label class="text-warning fs-4 mb-2">الساعة</label>
            <input class="form-control w-50 text-center mx-auto" type="time" name="Time" value="12:00">
          </div>
          <input hidden class="form-control w-50 text-center mx-auto" value="{{$Group->GroupName}} - {{$Group->Day}} - {{$Group->Time}}" type="text" name="OldName" value="12:00">
          <div class="data-text w-100 text-center mb-3">
            <label class="text-warning fs-4 mb-2">الفرع</label>
            <select class="w-50 text-center form-control mx-auto" value='{{$Group->Day}}' name="BranchName" name="" id="">
                @isset($Branches)
                @foreach ($Branches as $Branch)
    
                  <option value="{{$Branch->BranchName}}">{{$Branch->BranchName}}</option>
                    
                @endforeach
              @endisset
            </select>
          </div>
    
         
        </div>
    
        <button  type="submit" class="btn add-group btn-warning text-dark mt-4  w-25 mx-auto d-block">تعديل المجموعة</button>
       <section class="table-area mt-5 w-50">

</form>


  
<script src="{{asset('includes/custom/js/newgroup.js')}}"></script>
    
@endsection