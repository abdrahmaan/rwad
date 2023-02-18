<table class="table table-dark text-center table-bordered" dir="rtl">
    <thead>
        <tr>
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
    </tr>

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