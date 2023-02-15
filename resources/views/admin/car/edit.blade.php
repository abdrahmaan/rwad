@extends('admin.layouts.master')

@section('title',"تعديل بيانات لاعب")


@section('content')

    
    <form action="/admin/players/{{$Player->id}}" method="post" enctype="multipart/form-data">
      @csrf
      @method("PUT")
  <div class="player-data d-flex flex-column align-items-center flex-lg-row flex-lg-row-reverse mt-4" style="min-height: calc(100vh - 90px);">

    
    <div class="data-info  w-50 d-flex flex-column justify-content-center align-items-center">
        <div class="data-text w-100 text-center mb-3">
          <label class="text-warning fs-4 mb-2">إسم اللاعب</label>
          <input id="name" class="form-control w-50 text-center mx-auto" name="PlayerName" value="{{$Player->PlayerName}}" type="text" placeholder="إسم اللاعب ثلاثى">
        </div>
        <div class="data-text w-100 text-center mb-3">
          <label class="text-warning fs-4 mb-2">السن</label>
          <input class="form-control w-50 text-center mx-auto" name="Age" value="{{$Player->Age}}" type="number" placeholder="السن">
        </div>
        <div class="data-text w-100 text-center mb-3">
          <label class="text-warning fs-4 mb-2">رقم التيليفون</label>
          <input class="form-control w-50 text-center mx-auto" name="Phone" value="{{$Player->Phone1}}" type="number" placeholder="Ex. 0111XXXXXXX">
        </div>
        <div class="data-text w-100 text-center mb-3">
          <label class="text-warning fs-4 mb-2">رقم ولى الأمر</label>
          <input class="form-control w-50 text-center mx-auto" name="Phone2" value="{{$Player->Phone2}}" type="number" placeholder="Ex. 0111XXXXXXX">
        </div>
        <div class="data-text w-100 text-center mb-3">
          <label class="text-warning fs-4 mb-2">العنوان</label>
          <input class="form-control w-50 text-center mx-auto" name="Address" value="{{$Player->Address}}" type="text" placeholder="العنوان">
        </div>
        <div class="data-text w-100 text-center mb-3">
          <label class="text-warning fs-4 mb-2">تاريخ الميلاد</label>
          <input class="form-control w-50 text-center mx-auto" name="DateOfBirth" {{$Player->DateOfBirth}} type="date">
        </div>
        <div class="data-text w-100 text-center mb-3">
          <label class="text-warning fs-4 mb-2">تصنيف اللاعب</label>
          <select class="w-25 text-center form-control mx-auto" name="CategoryName" name="" id="">
            <option value="تحت 21 سنة">تحت 21 سنة</option>
            <option value="تحت 17 سنة">تحت 17 سنة</option>
            <option value="تحت 13 سنة ">تحت 13 سنة</option>
        </select>
        </div>
        <div class="data-text w-100 text-center mb-3">
          <label class="text-warning fs-4 mb-2">مركز اللاعب</label>
          <select class="w-25 text-center form-control mx-auto" name="Position" name="" id="">
            <option disabled value="">الدفاع</option>
            <option value="LB">LB</option>
            <option value="RB">RB</option>
            <option value="CB">CB</option>
            <option disabled value="">خط الوسط</option>
            <option value="CMF">CMF</option>
            <option value="LMF">LMF</option>
            <option value="RMF">RMF</option>
            <option value="DMF">DMF</option>
            <option value="AMF">AMF</option>
            <option disabled value="">الهجوم</option>
            <option value="LWF">LWF</option>
            <option value="RWF">RWF</option>
            <option value="CF">CF</option>
            <option value="SS">SS</option>
        </select>
        </div>
        <div class="data-text w-100 text-center mb-3">
          <label class="text-warning fs-4 mb-2">الطول</label>
          <input class="form-control w-25 text-center mx-auto" name="Height" value="{{$Player->Height}}" type="text" placeholder="الطول">
        </div>
        <div class="data-text w-100 text-center mb-3">
          <label class="text-warning fs-4 mb-2">الوزن</label>
          <input class="form-control w-25 text-center mx-auto" name="Weight"  value="{{$Player->Height}}" type="text" placeholder="الوزن">
        </div>
        <div class="data-text w-100 text-center mb-3">
          <label class="text-warning fs-4 mb-2">المجموعة</label>
          <select class="w-25 text-center form-control mx-auto" name="GroupName" name="" id="">
            @isset($groups)
              @foreach ($groups as $group)

                <option value="{{$group->GroupName}} - {{$group->Day}} - {{$group->Time}}">{{$group->GroupName}} - {{$group->Day}} - {{$group->Time}}</option>
                  
              @endforeach
            @endisset
        </select>
        </div>
        <div class="data-text w-100 text-center mb-3">
          <label class="text-warning fs-4 mb-2">الفرع</label>
          <select class="w-25 text-center form-control mx-auto" name="BranchName" name="" id="">
            @isset($branches)
            @foreach ($branches as $branch)

              <option value="{{$branch->BranchName}}">{{$branch->BranchName}}</option>
                
            @endforeach
          @endisset
        </select>
        </div>
        <div class="data-text w-100 text-center mb-3">
          <label class="text-warning fs-4 mb-2">فيديو للاعب</label>
          <input class="form-control w-50 text-center mx-auto"  value="{{$Player->VideoLink}}" name="VideoLink" type="text" placeholder="لينك فيديو Youtube">
        </div>
      </div>
  
      <div class="data-image  w-50 d-flex flex-column justify-content-center align-items-center">
        <img class="player-img" src="/includes/img/user.png" style="max-width: 220px; margin: 15px auto;" alt=""> 
        <label class="text-warning fs-4 mb-2">صورة اللاعب</label>
          <input class="form-control w-50 text-center mx-auto" name="PlayerImage" type="file" accept="image/png, image/jpeg">
      </div>
    </div>
  
  
    <button type="submit" class="btn add-player btn-warning text-dark mt-4  w-25 mx-auto d-block">تعديل البيانات</button>
    <a href="/admin/players" class="btn add-player btn-danger text-light text-dark mt-4  w-25 mx-auto d-block">إلغاء</a>

</form>

<script src="{{asset('includes/custom/js/newplayer.js')}}"></script>
    
@endsection