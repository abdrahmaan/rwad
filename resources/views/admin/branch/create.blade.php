
@extends('admin.layouts.master')



@section('title',"فروع الأكاديمية")

@section('content')
    
  <form action="/admin/branches" method="post">

    {{ csrf_field() }}
    @method('POST')
    <div class="branch-data d-flex flex-column align-items-center justify-content-center mt-4" style="min-height: calc(100vh - 180px);">
        <div class="group-info row w-100 d-flex flex-column justify-content-center align-items-center">
          <div class="data-text col-12 col-lg-7 text-center mb-3">
            <label class="text-warning fs-4 mb-2">إسم الفرع</label>
            <input id="name" class="form-control w-50 text-center mx-auto" name="BranchName" type="text" placeholder="إسم الفرع">
          </div>
         
        </div>
    
        <button id="btn" type="submit" class="btn add-branch  btn-warning text-dark mt-4  w-25 mx-auto d-block">تسجيل الفرع</button>
    
      </div>
    </form>



    
<section class="table-area  mt-5 mx-auto w-75 d-flex justify-content-center align-items-center">

  <table class="table   table-dark w-100 text-center">
    <thead>
      <td>التعديلات</td>
      <td>إسم الفرع</td>
    </thead>
    <tbody>
      @isset($Branches)
        @foreach ($Branches as $Branch)
        <tr>
          <td>
            <form action="/admin/branches/{{$Branch->id}}" method="POST" class="d-inline">
              @csrf
              {{ csrf_field() }}
              {{ method_field('DELETE') }} 
                <button type="submit" data-c='{{$Branch->id}}' class="btn btn-danger my-2">حذف</button>
            </form>
          </td>
          <td class="text-center align-middle">{{$Branch->BranchName}}</td>
        </tr>
        @endforeach
      @endisset  
    </tbody>
  </table>
 </section>

@endsection