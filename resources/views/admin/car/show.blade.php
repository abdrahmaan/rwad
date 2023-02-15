@extends('admin.layouts.player')


@section('title',"ملف اللاعب")
@section('icon',"bi bi-person-fill")
    {{-- {{dd()}} --}}

@section('content')


    <section id="Header" class="header bg-dark" style="min-height: 400px">
        <img id="wave" src="/includes/img/wave1.svg" alt="">
     
    </section>


    <section id="PlayerData" class="data d-flex justify-content-center" style="min-height: 350px;">
        <section class="player-data">
            <img id="player-img" src="{{$data["Player"]->ImagePath == null ? "/includes/img/bg-section.jpg" : "/playerimages/" . $data["Player"]->ImagePath }}" width="170px" height="170px" style="border-radius: 50%" alt="">
            <div class="content">
                <h2 class="text-light fs-2">
                    {{$data["Player"]->PlayerName}}
                </h2>
                <h2 class="text-warning fs-4">
                    {{$data["Player"]->CategoryName}}
                    <i class="bi bi-person-workspace mx-1"></i>
                </h2>
                <h2 class="text-warning fs-4">
                    {{$data["Player"]->Position}}
                <i class="bi bi-globe2 mx-1"></i>
                </h2>
                @if(session()->get("user-data")->Role == "Admin")
              
                <h2 class="text-warning fs-4">
                    {{$data["Player"]->Phone1}}
                <i class="bi bi-phone mx-1"></i>
                </h2>
                <h2 class="text-warning fs-4">
                    {{$data["Player"]->Phone2}}
                <i class="bi bi-phone mx-1"></i>
                </h2>
                
                <h2 class="text-warning fs-4">
                    {{$data["Player"]->Address}}
                <i class="bi bi-building mx-1"></i>
                </h2>
                
                <h2 class="text-warning fs-4">
                    {{$data["Player"]->DateOfBirth}}
                <i class="bi bi-calendar-fill mx-1"></i>
                </h2>
              @endif
            </div>
            <img id="cover" src="/includes/img/soccer-ball.png" width="300px" alt="">
        </section>
    </section>


    <div id="Player-Info" class="container"  style="min-height: 300px">
        <h3 class="text-dark text-end mb-4" dir="rtl">البيانات الشخصية :</h3>
        <section class="player-info row">   
        <div class="col-12 col-lg-4">
            <h2 id="player-info" class="bg-dark text-warning text-center align-middle p-3" style="">الوزن : {{$data["Player"]->Weight}} كجم</h2>
        </div>
        <div class="col-12 col-lg-4">
            <h2 id="player-info" class="bg-dark text-warning text-center align-middle p-3" style="">الطول :  {{$data["Player"]->Height}} سم</h2>
        </div>
        <div class="col-12 col-lg-4">
            <h2 id="player-info" class="bg-dark text-warning text-center align-middle p-3" style="">السن :  {{$data["Player"]->Age}} سنة</h2>
        </div>
        </section>

    </div>

@if(count($data["Skills"]) > 0)
    
    <div id="Player-Skills" class="container  py-4" style="min-height: fit-content">

            <h3 class="text-dark text-end mb-5" dir="rtl">التقييمات المهارية :</h3>
    
            
    {{-- {{dd($data["Skills"][0]->Skills)}} --}}
    {{-- {{dd(json_decode($data["Skills"][0]->Skills)->Kodra_3aqly[1])}} --}}
    {{-- {{dd(json_decode($data["Skills"])->Skills)->Adaa_Khaty[0]->Tamrera_Monasba}} --}}


            @foreach ($data["Skills"] as $skill)
            
            <div class="accordion my-2" id="accordion{{$skill->id}}">
                <div class="accordion-item">
                      <h2 class="accordion-header d-flex justify-content-center align-items-center" id="headingOne">
                          <button class="accordion-button text-center collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$skill->id}}" data-bs-expanded="false"  aria-controls="collapse{{$skill->id}}">
                          <h3 class="text-center text-warning w-100">
                              {{$skill->SkillType}} - {{explode("-",explode(" ",$skill->created_at)[0])[1]}}-{{explode("-",explode(" ",$skill->created_at)[0])[0]}}
                              <i class="bi bi-ui-checks"></i>                        
                            </h3>
                        </button>
                      </h2>
                      <div id="collapse{{$skill->id}}" class="accordion-collapse collapse collapsed" aria-labelledby="headingOne">
                        <div class="accordion-body p-0 row justify-content-center"> 
                                 {{-- {{dd(json_decode($skill->Skills)->التقييمات_البدنية[0]->التحمل->عام)}} --}}
                                {{-- {{dd(json_decode($skill->Skills)->التقييمات_البدنية[0]->التحمل)}} --}}
                                {{-- {{dd(json_decode($skill->Skills)->التقييمات_البدنية[0]->قوة)}} --}}
                                {{-- {{dd(json_decode($skill->Skills)->التقييمات_البدنية[0]->سرعة)}} --}}
                                {{-- {{dd(json_decode($skill->Skills)->التقييمات_البدنية[0]->رشاقة)}} --}}
                                {{-- {{dd(json_decode($skill->Skills)->التقييمات_البدنية[0]->مرونة)}} --}}
                                 {{-- الأداء الخطي و التقييمات المهارية --}}

                                 <div id="5aty&mahary" class="accordion col-lg-5 col-12  my-2" id="accordionExample">
                                    <div class="accordion-item">
                                    <h2 class="accordion-header d-flex justify-content-center align-items-center" id="headingOne">
                                        <button class="accordion-button text-center collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                                        <h3 class="text-center text-warning w-100">
                                            الأداء الخطي و التقييمات المهارية
                                         <i class="bi bi-calendar-check-fill mx-1"></i>
    
                                        </h3>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse collapsed" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body p-0">
                                        <div class="card data-text my-3 col-11 w-100 mx-auto p-0" style="min-height: 1490px">
                                            <div class="card-header text-secondary text-end fs-4">الأداء الخطي</div>
                                            <div class="card-body row justify-content-center">
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">التمريرة المناسبة</label>
                                                    <input id='myrange' data-name="عام" class="text-center w-100 mx-aut100" disabled value="{{json_decode($skill->Skills)->Adaa_Khaty[0]->Tamrera_Monasba}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Adaa_Khaty[0]->Tamrera_Monasba}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">اللعب المباشر</label>
                                                    <input id='myrange' data-name="أداء" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Adaa_Khaty[1]->Le3b_Mobasher}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Adaa_Khaty[1]->Le3b_Mobasher}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-5 mb-2">الجرى وأخذ مكان بعد الكرة</label>
                                                    <input id='myrange' data-name="سرعة" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Adaa_Khaty[2]->Gary_A5z_B3d_Kora}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Adaa_Khaty[2]->Gary_A5z_B3d_Kora}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">الجرى للكرة القادمة</label>
                                                    <input id='myrange' data-name="سرعة" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Adaa_Khaty[3]->gary_Kora_Kadma}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Adaa_Khaty[3]->gary_Kora_Kadma}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">الكفاح على الكرة</label>
                                                    <input id='myrange' data-name="سرعة" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Adaa_Khaty[4]->Kefa7_Kora}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Adaa_Khaty[4]->Kefa7_Kora}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">تغطية الزميل</label>
                                                    <input id='myrange' data-name="سرعة" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Adaa_Khaty[5]->Ta8tya_Zemel}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Adaa_Khaty[5]->Ta8tya_Zemel}}%</label>
                                                </div>
                                            
                                            </div>
                                            {{-- التقييمات المهارية --}}
                                            <div class="card data-text w-100 mx-auto p-0">
                                            <div class="card-header text-secondary text-end fs-4">التقييمات المهارية</div>
                                            <div class="card-body row justify-content-center">
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">تنطيط الكرة بالرجلين</label>
                                                    <input id='myrange' data-name="عام" class="text-center w-100 mx-aut100" disabled value="{{json_decode($skill->Skills)->Takyeem_Mahary[0]->Tanteet_Regleen}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Mahary[0]->Tanteet_Regleen}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">تنطيط الكرة بالرأس</label>
                                                    <input id='myrange' data-name="أداء" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Takyeem_Mahary[1]->Tanteen_Ras}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Mahary[1]->Tanteen_Ras}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-5 mb-2">تنطيط الكرة بالجسم كله</label>
                                                    <input id='myrange' data-name="سرعة" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Takyeem_Mahary[2]->Tanteet_Gesm}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Mahary[2]->Tanteet_Gesm}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">الركلات</label>
                                                    <input id='myrange' data-name="سرعة" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Takyeem_Mahary[3]->Raklat}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Mahary[3]->Raklat}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">الركل لأبعد مسافة</label>
                                                    <input id='myrange' data-name="سرعة" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Takyeem_Mahary[4]->Rakl_Ab3ad_Msafa}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Mahary[4]->Rakl_Ab3ad_Msafa}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">المراوغة</label>
                                                    <input id='myrange' data-name="سرعة" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Takyeem_Mahary[5]->Mraw8a}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Mahary[5]->Mraw8a}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">دقة التمرير</label>
                                                    <input id='myrange' data-name="عام" class="text-center w-100 mx-aut100" disabled value="{{json_decode($skill->Skills)->Takyeem_Mahary[6]->Deka_Tamrer}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Mahary[6]->Deka_Tamrer}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">دقة التصويب</label>
                                                    <input id='myrange' data-name="أداء" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Takyeem_Mahary[7]->Deka_Taswep}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Mahary[7]->Deka_Taswep}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-5 mb-2">رميةالتماس</label>
                                                    <input id='myrange' data-name="سرعة" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Takyeem_Mahary[8]->Ramyet_Tmas}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Mahary[8]->Ramyet_Tmas}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">الجرى بالكرة</label>
                                                    <input id='myrange' data-name="سرعة" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Takyeem_Mahary[9]->Gary_Kora}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Mahary[9]->Gary_Kora}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">ضرب الكرة بالرأس</label>
                                                    <input id='myrange' data-name="سرعة" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Takyeem_Mahary[10]->Darb_Kora_Ras}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Mahary[10]->Darb_Kora_Ras}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">السيطرة على الكرة</label>
                                                    <input id='myrange' data-name="سرعة" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Takyeem_Mahary[11]->Saytra_Kora}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Mahary[11]->Saytra_Kora}}%</label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                 {{-- التقييمات البدنية --}}
                                <div id="badany" class="accordion col-lg-5 col-12  my-2" id="accordionExample">
                                    <div class="accordion-item">
                                      <h2 class="accordion-header d-flex justify-content-center align-items-center" id="headingOne">
                                        <button class="accordion-button text-center collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" data-bs-expanded="false"  aria-controls="collapseOne">
                                          <h3 class="text-center text-warning w-100">
                                              التقييمات البدنية
                                          <i class="bi bi-calendar-check-fill mx-1"></i>
                                            
                                            </h3>
                                        </button>
                                      </h2>
                                      <div id="collapseOne" class="accordion-collapse collapse collapsed" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body p-0">
                                          <div class="card data-text my-3 w-100 col-10 mx-auto mx-3">
                                            <div class="card-header text-secondary text-end fs-4">التقييمات البدنية</div>
                                            <div class="card-body row justify-content-center">
                                               <h1 class="text-dark text-end pe-4 fs-3 mb-5">التحمل</h2>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column align-items-center text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">عام</label>
                                                    <input id='myrange'  data-name="عام" disabled class="text-center w-100" min="0" max="100" step="2.5" value="{{json_decode($skill->Skills)->Takyeem_Badany[0]->التحمل->عام}}" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Badany[0]->التحمل->عام}}%</label>
                                                    
                                                    
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column align-items-center text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">أداء</label>
                                                    <input id='myrange' disabled  data-name="أداء" class="text-center w-100" min="0" max="100" step="2.5" name="" value="{{json_decode($skill->Skills)->Takyeem_Badany[0]->التحمل->أداء}}" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Badany[0]->التحمل->أداء}}%</label>
                                                    
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column align-items-center text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">سرعة</label>
                                                    <input id='myrange'  data-name="سرعة" class="text-center w-100" min="0"  disabled max="100" step="2.5" name="" value="{{json_decode($skill->Skills)->Takyeem_Badany[0]->التحمل->سرعة}}" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Badany[0]->التحمل->سرعة}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column align-items-center text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">قوة</label>
                                                    <input id='myrange'  data-name="قوة" class="text-center w-100" disabled value="{{json_decode($skill->Skills)->Takyeem_Badany[0]->التحمل->قوة}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Badany[0]->التحمل->قوة}}%</label>
                                                </div>
    
                                                <h1 class="text-dark text-end pe-4 fs-3 mb-5">القوة</h2>
                                                    <div class="data-text col-lg-5 col-12 d-flex flex-column align-items-center text-center mb-3">
                                                        <label class="text-dark fs-4 mb-2">تحمل</label>
                                                        <input id='myrange' data-name="تحمل" class=" text-center w-100 mx-auto" disabled value="{{json_decode($skill->Skills)->Takyeem_Badany[0]->القوة->تحمل}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                      <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Badany[0]->القوة->تحمل}}%</label>
                                                    </div>
                                                    <div class="data-text col-lg-5 col-12 d-flex flex-column align-items-center text-center mb-3">
                                                        <label class="text-dark fs-4 mb-2">قدرة</label>
                                                        <input id='myrange'  data-name="قدرة" class="text-center w-100 mx-auto" disabled value="{{json_decode($skill->Skills)->Takyeem_Badany[0]->القوة->قدرة}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                      <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Badany[0]->القوة->قدرة}}%</label>
                                                    </div>
                                                    <div class="data-text col-lg-5 col-12 d-flex flex-column align-items-center text-center mb-3">
                                                        <label class="text-dark fs-4 mb-2">قصوى</label>
                                                        <input id='myrange' data-name="قصوى" class="text-center w-100 mx-auto" disabled value="{{json_decode($skill->Skills)->Takyeem_Badany[0]->القوة->قصوى}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                      <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Badany[0]->القوة->قصوى}}%</label>
                                                    </div>
                                                <h1 class="text-dark text-end pe-4 fs-3 mb-5">السرعة</h2>
                                                    <div class="data-text col-lg-5 col-12 d-flex flex-column align-items-center text-center mb-3">
                                                        <label class="text-dark fs-4 mb-2">إنتقالية</label>
                                                        <input id='myrange' data-name="إنتقالية" class="text-center w-100 m-auto" disabled value="{{json_decode($skill->Skills)->Takyeem_Badany[0]->السرعة->انتقالية}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                      <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Badany[0]->السرعة->انتقالية}}%</label>
                                                    </div>
                                                    <div class="data-text col-lg-5 col-12 d-flex flex-column align-items-center text-center mb-3">
                                                        <label class="text-dark fs-4 mb-2">حركية</label>
                                                        <input id='myrange' data-name="حركية" class="text-center w-100" disabled value="{{json_decode($skill->Skills)->Takyeem_Badany[0]->السرعة->حركية}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                      <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Badany[0]->السرعة->حركية}}%</label>
                                                    </div>
                                                    <div class="data-text col-lg-5 col-12 d-flex flex-column align-items-center text-center mb-3">
                                                        <label class="text-dark fs-4 mb-2">رد فعل</label>
                                                        <input id='myrange'  data-name="رد فعل" class="text-center w-100 mx-auto" disabled value="{{json_decode($skill->Skills)->Takyeem_Badany[0]->السرعة->رد_فعل}}"  min="0" max="100" step="2.5" type="range" placeholder="لينك فيديو Youtube">
                                                      <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Badany[0]->السرعة->رد_فعل}}%</label>
                                                    </div>
                                                <h1 class="text-dark text-end pe-4 fs-3 mb-5">رشاقة</h2>
                                                    <div class="data-text col-lg-5 col-12 d-flex flex-column align-items-center text-center mb-3">
                                                        <label class="text-dark fs-4 mb-2">خاص</label>
                                                        <input id='myrange' data-name="خاص" class="text-center w-100 mx-auto" disabled value="{{json_decode($skill->Skills)->Takyeem_Badany[0]->الرشاقة->خاص}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                      <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Badany[0]->الرشاقة->خاص}}%</label>
                                                    </div>
                                                    <div class="data-text col-lg-5 col-12 d-flex flex-column align-items-center text-center mb-3">
                                                        <label class="text-dark fs-4 mb-2">عام</label>
                                                        <input id='myrange'  data-name="عام" class="text-center w-100 mx-auto" disabled value="{{json_decode($skill->Skills)->Takyeem_Badany[0]->الرشاقة->خاص}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                      <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Badany[0]->الرشاقة->عام}}%</label>
                                                    </div>
                                                <h1 class="text-dark text-end pe-4 fs-3 mb-5">مرونة</h2>
                                                    <div class="data-text col-lg-5 col-12 d-flex flex-column align-items-center text-center mb-3">
                                                        <label class="text-dark fs-4 mb-2">خاص</label>
                                                        <input id='myrange'data-name="خاص" class="text-center w-100 mx-auto" disabled value="{{json_decode($skill->Skills)->Takyeem_Badany[0]->المرونة->خاص}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                      <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Badany[0]->المرونة->خاص}}%</label>
                                                    </div>
                                                    <div class="data-text col-lg-5 col-12 d-flex flex-column align-items-center text-center mb-3">
                                                        <label class="text-dark fs-4 mb-2">عام</label>
                                                        <input id='myrange'  data-name="عام" class="text-center w-100 mx-auto" disabled value="{{json_decode($skill->Skills)->Takyeem_Badany[0]->المرونة->عام}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                      <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Takyeem_Badany[0]->المرونة->عام}}%</label>
                                                    </div>
                                            </div>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
    
                                 {{-- القدرات العقلية --}}
                                 <div id="3aqly" class="accordion col-lg-5 col-12  my-2" id="accordionExample">
                                    <div class="accordion-item">
                                    <h2 class="accordion-header d-flex justify-content-center align-items-center" id="headingOne">
                                        <button class="accordion-button text-center collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseOne">
                                        <h3 class="text-center text-warning w-100">
                                            القدرات العقلية
                                         <i class="bi bi-calendar-check-fill mx-1"></i>
                                            
                                        </h3>
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse collapsed" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body p-0">
                                        <div class="card data-text my-3 w-100">
                                            <div class="card-header text-secondary text-end fs-4">القدرات العقلية</div>
                                            <div class="card-body row justify-content-center">
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">تركيز الإنتباه</label>
                                                    <input id='myrange' data-name="عام" class="text-center w-100 mx-aut100" disabled value="{{json_decode($skill->Skills)->Kodra_3aqly[0]->Tarkez_Entbah}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Kodra_3aqly[0]->Tarkez_Entbah}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">الملاحظة</label>
                                                    <input id='myrange' data-name="أداء" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Kodra_3aqly[1]->Mola7za}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Kodra_3aqly[1]->Mola7za}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">التفكير</label>
                                                    <input id='myrange' data-name="سرعة" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Kodra_3aqly[2]->Tafker}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Kodra_3aqly[2]->Tafker}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">القدرة على الإستنتاج</label>
                                                    <input id='myrange' data-name="قوة" class="text-center w-100 mx-aut100" disabled value="{{json_decode($skill->Skills)->Kodra_3aqly[3]->Koda_3la_Estntag}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Kodra_3aqly[3]->Koda_3la_Estntag}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">سرعة التصرف</label>
                                                    <input id='myrange' data-name="قوة" class="text-center w-100 mx-aut100" disabled value="{{json_decode($skill->Skills)->Kodra_3aqly[4]->Sor3_Tasarof}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Kodra_3aqly[4]->Sor3_Tasarof}}%</label>
                                                </div>
                                
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                   {{-- الحالة النفسية --}}
                                <div id="nafsy" class="accordion col-lg-5 col-12 my-2" id="accordionExample">
                                    <div class="accordion-item">
                                    <h2 class="accordion-header d-flex justify-content-center align-items-center" id="headingOne">
                                        <button class="accordion-button text-center collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseOne">
                                        <h3 class="text-center text-warning w-100">
                                            الحالة النفسية
                                         <i class="bi bi-calendar-check-fill mx-1"></i>
                                            
                                        </h3>
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse collapsed" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body p-0">
                                            <div class="card data-text my-3  w-100">
                                            <div class="card-header text-secondary text-end fs-4">الحالة النفسية</div>
                                            <div class="card-body row justify-content-center">
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">الثقة بالنفس</label>
                                                    <input id='myrange' data-name="عام" disabled value="{{json_decode($skill->Skills)->Hala_Nafsy[0]->Seqa_Nafs}}" class="text-center w-100 mx-aut100" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Hala_Nafsy[0]->Seqa_Nafs}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">الشجاعة</label>
                                                    <input id='myrange' data-name="أداء" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Hala_Nafsy[1]->Shaga3a}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Hala_Nafsy[1]->Shaga3a}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">الكفاح</label>
                                                    <input id='myrange' data-name="سرعة" class="text-center w-100 mx-au100o" disabled value="{{json_decode($skill->Skills)->Hala_Nafsy[2]->Kefa7}}"  min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Hala_Nafsy[2]->Kefa7}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">عدم التردد</label>
                                                    <input id='myrange' data-name="قوة" class="text-center w-100 mx-aut100" disabled value="{{json_decode($skill->Skills)->Hala_Nafsy[3]->Adam_Taradod}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Hala_Nafsy[3]->Adam_Taradod}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">المثابرة</label>
                                                    <input id='myrange' data-name="قوة" class="text-center w-100 mx-aut100" disabled value="{{json_decode($skill->Skills)->Hala_Nafsy[4]->Mosabra}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Hala_Nafsy[4]->Mosabra}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">التصميم</label>
                                                    <input id='myrange' data-name="قوة" class="text-center w-100 mx-aut100" disabled value="{{json_decode($skill->Skills)->Hala_Nafsy[5]->Tasmem}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Hala_Nafsy[5]->Tasmem}}%</label>
                                                </div>
                                                <div class="data-text col-lg-5 col-12 d-flex flex-column text-center mb-3">
                                                    <label class="text-dark fs-4 mb-2">المبادأة</label>
                                                    <input id='myrange' data-name="قوة" class="text-center w-100 mx-aut100" disabled value="{{json_decode($skill->Skills)->Hala_Nafsy[6]->Mobad2a}}" min="0" max="100" step="2.5" name="" type="range" placeholder="لينك فيديو Youtube">
                                                    <label class="text-danger fs-4 mb-2">{{json_decode($skill->Skills)->Hala_Nafsy[6]->Mobad2a}}%</label>
                                                </div>
                                    
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
    
                                <form class="col-lg-8 col-12 my-4" action="/admin/skills/{{$skill->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger w-100">حذف التقييم</button>
                                </form>
                        </div>
                      </div>
                    </div>
                  </div>
    
                @endforeach
           
        
    
            </div>    
 
@endif


@endsection



@section('css')

    <style>

        body{
            background-color: #F3F4F5;
            user-select: none;
            overflow-x: hidden;
        }

        section.header{
            background-image: url("/includes/img/hero.jpg");
            background-position: bottom center;
            background-size: cover;
            position: relative;
        }

        section.header img#wave{
            position: absolute;
            bottom: -120px;
            right: 0;
            width: 100%;
        }

        section.data{
            position: relative;


        }
        section.player-data{
            position: absolute;
            width: 600px;
            min-height: 400px;
            background-color: #28292B;
            border-radius: 55px;
            top: -180px;      


        }
        section.player-data img#player-img{
            position: absolute;
            top: -85px;
            right:  50%;
            transform: translateX(50%);
            border: 6px solid #FFC200;
            z-index: 100;
        }

        section.player-data img#cover{
            position: absolute;
            top: 0px;
            right:  20px;
            z-index: 1;
            opacity: 10%;
        }

       .data section.player-data div.content{
           position: relative;
           text-align: center;
           margin-top: 100px;
           z-index: 100;
        }

       .container h2#player-info {
          border-radius: 80px;
        }

        .progressbar-text {
      color: black;
         font-size: 30px !important;
  }

  /* Range Style Start */
  input[type=range] {
  height: 27px;
  -webkit-appearance: none;
  margin: 10px 0;
  width: 100%;
}
input[type=range]:focus {
  outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 9px;
  cursor: pointer;
  animate: 0.2s;
  box-shadow: 1px 1px 1px #000000;
  background: #DCB414;
  border-radius: 5px;
  border: 1px solid #000000;
}
input[type=range]::-webkit-slider-thumb {
  box-shadow: 1px 1px 1px #000000;
  border: 1px solid #000000;
  height: 19px;
  width: 19px;
  border-radius: 47px;
  background: #FFFFFF;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -6px;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: #DCB414;
}
input[type=range]::-moz-range-track {
  width: 100%;
  height: 9px;
  cursor: pointer;
  animate: 0.2s;
  box-shadow: 1px 1px 1px #000000;
  background: #DCB414;
  border-radius: 5px;
  border: 1px solid #000000;
}
input[type=range]::-moz-range-thumb {
  box-shadow: 1px 1px 1px #000000;
  border: 1px solid #000000;
  height: 19px;
  width: 19px;
  border-radius: 47px;
  background: #FFFFFF;
  cursor: pointer;
}
input[type=range]::-ms-track {
  width: 100%;
  height: 9px;
  cursor: pointer;
  animate: 0.2s;
  background: transparent;
  border-color: transparent;
  color: transparent;
}
input[type=range]::-ms-fill-lower {
  background: #DCB414;
  border: 1px solid #000000;
  border-radius: 10px;
  box-shadow: 1px 1px 1px #000000;
}
input[type=range]::-ms-fill-upper {
  background: #DCB414;
  border: 1px solid #000000;
  border-radius: 10px;
  box-shadow: 1px 1px 1px #000000;
}
input[type=range]::-ms-thumb {
  margin-top: 1px;
  box-shadow: 1px 1px 1px #000000;
  border: 1px solid #000000;
  height: 19px;
  width: 19px;
  border-radius: 47px;
  background: #FFFFFF;
  cursor: pointer;
}
input[type=range]:focus::-ms-fill-lower {
  background: #DCB414;
}
input[type=range]:focus::-ms-fill-upper {
  background: #DCB414;
}

  /* Range Style End  */


  .accordion-button:not(.collapsed){
    background-color: #7e180f !important;
}

.accordion-item:last-of-type .accordion-button.collapsed{
    background-color: #212529 !important;
}

        @media (min-width   :319px) and (max-width: 719px){

            section.player-data{
            width: 320px;
  
        }
        }
    </style>
@endsection



@section('script')

<script type="text/javascript" src="/includes/lib/progressbar.js"></script>

<script>
 var circle_badany_tahamol_ada2 = new ProgressBar.Circle('#badany-tahamol-ada2', {
    color: '#a21d14',
    strokeWidth: 3,
    trailWidth: 1,
    text: {
        value: '50%'
    },
    style: {
        width: "100px"
    }
});
 var circle_badany_tahamol_3am= new ProgressBar.Circle('#badany-tahamol-3am', {
    color: '#a21d14',
    strokeWidth: 3,
    trailWidth: 1,
    text: {
        value: '50%'
    },

});
 var circle_badany_tahamol_qowa = new ProgressBar.Circle('#badany-tahamol-qowa', {
    color: '#a21d14',
    strokeWidth: 3,
    trailWidth: 1,
    text: {
        value: '50%'
    },
    style: {
        width: "100px"
    }
});
 var circle_badany_tahamol_sor3a = new ProgressBar.Circle('#badany-tahamol-sor3a    ', {
    color: '#a21d14',
    strokeWidth: 3,
    trailWidth: 1,
    text: {
        value: '50%'
    },
    style: {
        width: "100px"
    }
});


array = [circle_badany_tahamol_3am,circle_badany_tahamol_ada2,circle_badany_tahamol_qowa,circle_badany_tahamol_sor3a]

array.forEach(circ => {

circ.animate(0.8,{duration: 800})
    
});
</script>
@endsection

