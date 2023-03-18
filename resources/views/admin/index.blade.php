

    @extends('admin.layouts.master')


    @section('title',"الرئيسية")
    @section('icon',"bi bi-graph-up-arrow mx-1")



    {{-- Store Admin Role In LocalStorage --}}
    @isset(session()->get('user')->Role)

            <script>
                window.localStorage.setItem('role', "{{session()->get('user')->Role}}");
            </script>
    @endisset

    @section('content')



           {{-- {{dd($data)}} --}}

            
           <section class="row m-0 p-0  justify-content-center flex-row-reverse" style="min-height: 500px">

            
            <div class="col-lg-9 col-12 my-3">
                <div class="card border-0" style="min-height: 300px">
                    <div class="card-header text-center d-flex justify-content-between align-items-center">
                        <h3 class="text-warning fs-5">
                            مشاهدة الكل
                         </h3>
                        <h3 class="text-light">
                            الإشعارات
                            <i class="bi bi-bell-fill"></i>
                         </h3>
                        
                    </div>
                    <div class="card-body p-0">
 
                     <table class="table table-light table-striped table-bordered text-center align-middle" dir="rtl">
                         <thead>
                             <th>#</th>
                             <th>الفرع</th>
                             <th>طباشيرى</th>
                             <th>رقم اللوحة</th>
                             <th>الإشعار</th>
                             <th>البيان</th>
                             <th>المسؤول</th>
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
                             </tr>
                             <tr>
                                 <td>
                                     <img src="/includes/img/car-transfer.png" width="70px" alt="">
                                 </td>
                                 <td>الإسكندرية</td>
                                 <td>60</td>
                                 <td>د س ق - 594</td>
                                 <td>إقتراب تغيير (فتر هواء)</td>
                                 <td>تغيير (فلتر هواء) بعد 50 كيلو عند عداد 567098</td>
                                 <td>Automatic</td>
                             </tr>
                             <tr>
                                 <td>
                                     <img src="/includes/img/car-transfer.png" width="70px" alt="">
                                 </td>
                                 <td>المنصورة</td>
                                 <td>88</td>
                                 <td>أ م ر - 894</td>
                                 <td>تمويين مبكر للوقود</td>
                                 <td>تمويين مبكر 35 كيلو عن عداد 555723</td>
                                 <td>محمود كريم</td>

                             </tr>
                         </tbody>
                     </table>
 
                     </canvas>
                    </div>
                </div>
            </div>
     
            <div class="col-lg-5 col-12 my-3">
               <div class="card border-0" style="min-height: 300px">
                   <div class="card-header bg-dark text-center">
                       <h3 class="text-light">
                           فرق العدادات
                           <i class="bi bi-browser-safari"></i>
                        </h3>
                   </div>
                   <div class="card-body">

                    <canvas class="one-data" style="min-height: 300px;">

                    </canvas>
                   </div>
               </div>
            </div>
        
            <div class="col-lg-5 col-12 my-3">
                <div class="card border-0" style="min-height: 300px">
                    <div class="card-header bg-dark text-center">
                        <h3 class="text-light">
                            السولار
                            <i class="bi bi-currency-dollar"></i>
                         </h3>
                    </div>
                    <div class="card-body">
 
                     <canvas class="three-data" style="min-height: 300px;">
 
                     </canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-12 my-3">
                <div class="card border-0" style="min-height: 300px">
                    <div class="card-header text-center">
                        <h3 class="text-light">
                            السيارات
                            <i class="bi bi-car-front-fill"></i>
                         </h3>
                    </div>
                    <div class="card-body">
 
                     <canvas class="two-data" style="min-height: 300px; width:100%">
 
                     </canvas>
                    </div>
                </div>
            </div>
    


           <style>
               section.one-data{
                   border-radius: 20px;
                   background-image: url("/includes/img/slide-3.jpg");
                   background-position: center center;
                   background-size: cover;
                   position: relative;
                   box-shadow: 5px 5px 5px -3px black ; 
                   border: 2px solid white;
                   border-width: 2px 2px 0px 0px          
                }
                
                section.one-data::before{
                   border-radius: 20px;
                    content: "";
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.795);
                    position: absolute;
                    z-index: 1;
                }

                .card-header{
                    /* background: linear-gradient(203deg, rgba(133,24,24,1) 20%, rgba(9,9,121,1) 40%) !important; */
                     background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgb(32, 157, 182) 100%) !important; 


                }
           </style>

    @endsection


    @section('script')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        let ele3adadat = document.querySelector("canvas.one-data");
        let eleCars = document.querySelector("canvas.two-data");
        let eleSollar = document.querySelector("canvas.three-data");
        let eleGroup = document.querySelector("canvas.four-data");
        let elePurchase = document.querySelector("canvas.five-data");

        let chartCars = new Chart(eleCars,
        {
            type: 'bar',
            data: {
            labels: ["ميكروباص","نقل امول","ملاكى","موتوسيكل"],
            datasets: [{
                label: 'العدد',
                data: [
                   5,6,7,8
                ],
                borderWidth: 1,
                backgroundColor: '#00086a',

            }]
            },
        });

        let chart3adadat = new Chart(ele3adadat,
            {
                type: 'bar',
            data: {
            labels: ["فرق عداد - شهرياً", "فرق عداد - اليوم"],
            datasets: [{
                label: 'المجموع',
                data: [
                    5000,
                    5000,
                ],
                backgroundColor: '#006ba1',
                borderWidth: 1
            }]
            },
            });


        let chartSollar = new Chart(eleSollar,
            {
                type: 'bar',
            data: {
            labels: ["السولار - سنوياً", "السولار - شهرياً"],
            datasets: [{
                label: 'المجموع',
                data: [
                    2000,
                   4000,
                ],
                backgroundColor: '#006ba1',
                borderWidth: 1
            }]
            },
            });

            
        let chartPurchase = new Chart(elePurchase,
            {
                type: 'bar',
            data: {
            labels: ["المشتريات - سنوياً","المشتريات - شهرياً"],
            datasets: [{
                label: 'المجموع',
                data: [
                    7000,
                    5000,
                ],
                backgroundColor: '#006ba1',
                borderWidth: 1
            }]
            },
            });

    </script>

    @endsection