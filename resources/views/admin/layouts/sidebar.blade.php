
    @if (session()->get('user-data')->Role == "Admin" || session()->get('user-data')->Role == "المدير المالى")
        <!-- Sidebar Start -->
        <div class="offcanvas offcanvas-end" data-bs-backdrop="true" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
          <div class="offcanvas-header my-2 d-flex flex-row-reverse align-items-center ">
              <h5 class="offcanvas-title text-light" id="offcanvasBottomLabel">القائمة الرئيسية</h5>
              <button type="button" class="btn-close text-reset text-light bg-light m-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <img src="/includes/img/logo.png" style="max-width: 150px; margin: auto;" alt="">
          <h4 class="username text-light text-center mb-2 fs-5">
            {{session()->get('user-data')->FullName}}
            </h4>
            <h4 class="role text-light bg-danger w-50 mx-auto rounded text-center mt-2 mb-3 fs-5">{{session()->get('user-data')->Role}}</h4>
          <hr class="dropdown-divider bg-light w-100 mx-auto" style="min-height: 2px;">
          <div class="offcanvas-body d-flex flex-column align-items-end px-0">
              <!-- الرئيسية -->
              <a class="dropdown-item text-light text-end pe-3 py-2" href="{{route('dashboard.index')}}">
                  الرئيسية
                  <i class="bi bi-graph-up-arrow mx-1"></i>
                </a>
              <!-- الإشعارات -->
              <a class="dropdown-item text-light text-end pe-3 py-2" href="/admin/notifcations">
                <span class="badge badge-danger bg-danger">4</span>

                  الإشعارات
                  <i class="bi bi-bell-fill mx-1"></i>
                  
                </a>
              <!-- السيارات -->
              <div class="dropdown w-100 mb-2">
                  <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    إدارة السيارات
                    <i class="bi bi-pin-map-fill"></i>
                  </button>
                  <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                    
                    <li><a class="dropdown-item text-light" href="{{route('cartypes.create')}}">
                         نوع سيارة جديد
                        <i class="bi bi-car-front-fill mx-1"></i>
                      </a></li>
                    <li><a class="dropdown-item text-light" href="{{route('cartypes.index')}}">
                        أنواع السيارات
                        <i class="bi bi-car-front-fill mx-1"></i>
                      </a></li>
                    <li><a class="dropdown-item text-light" href="{{route('cars.create')}}">
                        تسجيل سيارة جديدة
                        <i class="bi bi-car-front-fill mx-1"></i>
                      </a></li>
                    <li><a class="dropdown-item text-light" href="{{route('cars.index')}}">
                        بحث فى السيارات
                        <i class="bi bi-pie-chart-fill mx-1"></i>
                      </a></li>
                  </ul>
              </div>
              <!-- الحركة اليومية -->
              <div class="dropdown w-100 mb-2">
                  <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    إدارة الحركة اليومية
                    <i class="bi bi-pin-map-fill"></i>
                  </button>
                  <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                    <li><a class="dropdown-item text-light" href="{{route('movments.create')}}">
                        تسجيل حركة يومية
                        <i class="bi bi-file-earmark-plus mx-1"></i>
                      </a></li>
                    <li><a class="dropdown-item text-light" href="{{route('movments.index')}}">
                        بحث فى الحركات اليومية
                        <i class="bi bi-pie-chart-fill mx-1"></i>
                      </a></li>
                  </ul>
              </div>
              <!-- السولار -->
              <div class="dropdown w-100 mb-2">
                  <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    إدارة الوقود
                    <i class="bi bi-pin-map-fill"></i>
                  </button>
                  <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                    <li><a class="dropdown-item text-light" href="{{route('fuel.create')}}">
                        تسجيل وقود سيارة
                        <i class="bi bi-fuel-pump mx-1"></i>
                      </a></li>
                    <li><a class="dropdown-item text-light" href="{{route('fuel.index')}}">
                        بحث فى وقود السيارات
                        <i class="bi bi-pie-chart-fill mx-1"></i>
                      </a></li>
                    <li><a class="dropdown-item text-light" href="/admin/fuelprice">
                         أسعار الوقود
                        <i class="bi bi-coin mx-1"></i>
                      </a></li>
                  </ul>
              </div>
              <!-- الصيانة -->
              <div class="dropdown w-100 mb-2">
                  <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  إدارة الصيانة
                    <i class="bi bi-pin-map-fill"></i>
                  </button>
                  <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                    <li><a class="dropdown-item text-light" href="{{route('maintainces.create')}}">
                        تسجيل صيانة جديدة
                        <i class="bi bi-gear-wide-connected mx-1"></i>
                      </a></li>
                    <li><a class="dropdown-item text-light" href="{{route('maintainces.index')}}">
                        بحث فى صيانة السيارات
                        <i class="bi bi-pie-chart-fill mx-1"></i>
                      </a></li>
                  </ul>
              </div>
              {{-- <!-- المخازن -->
              <div class="dropdown w-100 mb-2">
                  <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  إدارة المخازن
                    <i class="bi bi-pin-map-fill"></i>
                  </button>
                  <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                    <li><a class="dropdown-item text-light" href="{{route('inventory.create')}}">
                        تسجيل صنف
                        <i class="bi bi-file-earmark-plus mx-1"></i>
                      </a></li>
                    <li><a class="dropdown-item text-light" href="{{route('cars.index')}}">
                        بحث فى المخازن
                        <i class="bi bi-pie-chart-fill mx-1"></i>
                      </a></li>
                  </ul>
              </div> --}}
              {{-- <!-- المشتريات -->
              <div class="dropdown w-100 mb-2">
                  <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  إدارة المشتريات
                    <i class="bi bi-pin-map-fill"></i>
                  </button>
                  <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                    <li><a class="dropdown-item text-light" href="{{route('purchases.create')}}">
                        تسجيل أمر شراء
                        <i class="bi bi-coin mx-1"></i>
                      </a></li>
                    <li><a class="dropdown-item text-light" href="{{route('cars.index')}}">
                        بحث فى اوامر الشراء
                        <i class="bi bi-pie-chart-fill mx-1"></i>
                      </a></li>
                  </ul>
              </div> --}}
              <!-- الحسابات -->
              <div class="dropdown w-100 mb-2">
                  <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  إدارة الحسابات
                    <i class="bi bi-pin-map-fill"></i>
                  </button>
                  <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                    <li><a class="dropdown-item text-light" href="/admin/newuser">
                        حساب جديد
                        <i class="bi bi-person-fill mx-1"></i>
                      </a></li>
                    <li><a class="dropdown-item text-light" href="/admin/users">
                        الحسابات الموجودة
                        <i class="bi bi-pie-chart-fill mx-1"></i>
                      </a></li>
                  </ul>
              </div>
              <!-- الإعدادات -->
              <div class="dropdown w-100 mb-2">
                  <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                      الإعدادات
                    <i class="bi bi-gear-wide-connected"></i>
                  </button>
                  <ul class="dropdown-menu w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                    <li><a class="dropdown-item text-light" href="/admin/branches/create">
                        الفروع
                        <i class="bi bi-collection-fill mx-1"></i>
                      </a></li>
                      <li><a class="dropdown-item text-light" href="/admin/branches/create">
                          بنود الصيانة
                          <i class="bi bi-collection-fill mx-1"></i>
                        </a></li>
                      <li><a class="dropdown-item text-light" href="/admin/logging">
                          تسجيلات الدخول
                          <i class="bi bi-person-fill mx-1"></i>
                        </a></li>
                  </ul>
              </div>
              <!-- تسجيل الخروج -->
              <a class="dropdown-item text-light text-end pe-3 py-2" href="/admin/logout">
                  تسجيل الخروج
                  <i class="bi bi-box-arrow-in-left mx-1"></i>
                </a>
          </div>
          </div>
          <!-- Sidebar End -->

    @endif

    
    @if (session()->get('user-data')->Role !== "Admin" && session()->get('user-data')->Role !== "المدير المالى") 
      <!-- Sidebar Start -->
      <div class="offcanvas offcanvas-end" data-bs-backdrop="true" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header my-2 d-flex flex-row-reverse align-items-center ">
            <h5 class="offcanvas-title text-light" id="offcanvasBottomLabel">القائمة الرئيسية</h5>
            <button type="button" class="btn-close text-reset text-light bg-light m-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <img src="/includes/img/logo.png" style="max-width: 150px; margin: auto;" alt="">
        <h4 class="username text-light text-center mb-2 fs-5">
          {{session()->get('user-data')->FullName}}
          </h4>
          <h4 class="role text-light bg-danger w-50 mx-auto rounded text-center mt-2 mb-3 fs-5">{{session()->get('user-data')->Role}}</h4>
        <hr class="dropdown-divider bg-light w-100 mx-auto" style="min-height: 2px;">
        <div class="offcanvas-body d-flex flex-column align-items-end px-0">
            {{-- مدخل بيانات --}}
            @if (session()->get('user-data')->Role == "مدخل بيانات")
              
                  <div class="dropdown w-100 mb-2">
                    <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      إدارة الحركة اليومية
                      <i class="bi bi-pin-map-fill"></i>
                    </button>
                    <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                      <li><a class="dropdown-item text-light" href="{{route('movments.create')}}">
                          تسجيل حركة يومية
                          <i class="bi bi-file-earmark-plus mx-1"></i>
                        </a></li>
                      <li><a class="dropdown-item text-light" href="{{route('movments.index')}}">
                          بحث فى الحركات اليومية
                          <i class="bi bi-pie-chart-fill mx-1"></i>
                        </a></li>
                    </ul>
                </div>
                <!-- السولار -->
                <div class="dropdown w-100 mb-2">
                    <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      إدارة السولار
                      <i class="bi bi-pin-map-fill"></i>
                    </button>
                    <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                      <li><a class="dropdown-item text-light" href="{{route('sollars.create')}}">
                          تسجيل سولار
                          <i class="bi bi-fuel-pump mx-1"></i>
                        </a></li>
                      <li><a class="dropdown-item text-light" href="{{route('sollars.index')}}">
                          بحث فى تسجيلات السولار
                          <i class="bi bi-pie-chart-fill mx-1"></i>
                        </a></li>
                    </ul>
                </div>
                <!-- الصيانة -->
                <div class="dropdown w-100 mb-2">
                    <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    إدارة الصيانة
                      <i class="bi bi-pin-map-fill"></i>
                    </button>
                    <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                      <li><a class="dropdown-item text-light" href="{{route('maintainces.create')}}">
                          تسجيل صيانة جديدة
                          <i class="bi bi-gear-wide-connected mx-1"></i>
                        </a></li>
                      <li><a class="dropdown-item text-light" href="{{route('maintainces.index')}}">
                          بحث فى صيانة السيارات 
                          <i class="bi bi-pie-chart-fill mx-1"></i>
                        </a></li>
                    </ul>
                </div>
                      <!-- تسجيل الخروج -->
                      <a class="dropdown-item text-light text-end pe-3 py-2" href="/admin/logout">
                        تسجيل الخروج
                        <i class="bi bi-box-arrow-in-left mx-1"></i>
                      </a>

                    </div>
                    </div>
                    <!-- Sidebar End -->
            @endif 
            {{-- مدير الحركة --}}
            @if (session()->get('user-data')->Role == "مدير الحركة")
                <!-- الصيانة -->
                <div class="dropdown w-100 mb-2">
                    <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    إدارة الصيانة
                      <i class="bi bi-pin-map-fill"></i>
                    </button>
                    <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                      <li><a class="dropdown-item text-light" href="{{route('maintainces.create')}}">
                          تسجيل صيانة جديدة
                          <i class="bi bi-gear-wide-connected mx-1"></i>
                        </a></li>
                      <li><a class="dropdown-item text-light" href="{{route('cars.index')}}">
                          بحث فى صيانة السيارات 
                          <i class="bi bi-pie-chart-fill mx-1"></i>
                        </a></li>
                    </ul>
                </div>
                      <!-- تسجيل الخروج -->
                      <a class="dropdown-item text-light text-end pe-3 py-2" href="/admin/logout">
                        تسجيل الخروج
                        <i class="bi bi-box-arrow-in-left mx-1"></i>
                      </a>

                    </div>
                    </div>
                    <!-- Sidebar End -->
            @endif 
               {{-- مدخل بيانات --}}
            @if (session()->get('user-data')->Role == "مدير إدخال بيانات")
                                  <!-- الإحصائيات -->
              <a class="dropdown-item text-light text-end pe-3 py-2" href="{{route('dashboard.index')}}">
                  الإحصائيات
                  <i class="bi bi-graph-up-arrow mx-1"></i>
                </a>
              <!-- السيارات -->
              <div class="dropdown w-100 mb-2">
                  <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    إدارة السيارات
                    <i class="bi bi-pin-map-fill"></i>
                  </button>
                  <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                    <li><a class="dropdown-item text-light" href="{{route('cars.create')}}">
                        تسجيل سيارة جديدة
                        <i class="bi bi-car-front-fill mx-1"></i>
                      </a></li>
                    <li><a class="dropdown-item text-light" href="{{route('cars.index')}}">
                        بحث فى السيارات
                        <i class="bi bi-pie-chart-fill mx-1"></i>
                      </a></li>
                  </ul>
              </div>
                  <div class="dropdown w-100 mb-2">
                    <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      إدارة الحركة اليومية
                      <i class="bi bi-pin-map-fill"></i>
                    </button>
                    <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                      <li><a class="dropdown-item text-light" href="{{route('movments.create')}}">
                          تسجيل حركة يومية
                          <i class="bi bi-file-earmark-plus mx-1"></i>
                        </a></li>
                      <li><a class="dropdown-item text-light" href="{{route('movments.index')}}">
                          بحث فى الحركات اليومية
                          <i class="bi bi-pie-chart-fill mx-1"></i>
                        </a></li>
                    </ul>
                </div>
                <!-- السولار -->
                <div class="dropdown w-100 mb-2">
                    <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      إدارة السولار
                      <i class="bi bi-pin-map-fill"></i>
                    </button>
                    <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                      <li><a class="dropdown-item text-light" href="{{route('sollars.create')}}">
                          تسجيل سولار
                          <i class="bi bi-fuel-pump mx-1"></i>
                        </a></li>
                      <li><a class="dropdown-item text-light" href="{{route('sollars.index')}}">
                          بحث فى تسجيلات السولار
                          <i class="bi bi-pie-chart-fill mx-1"></i>
                        </a></li>
                    </ul>
                </div>
                <!-- الصيانة -->
                <div class="dropdown w-100 mb-2">
                    <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    إدارة الصيانة
                      <i class="bi bi-pin-map-fill"></i>
                    </button>
                    <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                      <li><a class="dropdown-item text-light" href="{{route('maintainces.create')}}">
                          تسجيل صيانة جديدة
                          <i class="bi bi-gear-wide-connected mx-1"></i>
                        </a></li>
                      <li><a class="dropdown-item text-light" href="{{route('cars.index')}}">
                          بحث فى صيانة السيارات
                          <i class="bi bi-pie-chart-fill mx-1"></i>
                        </a></li>
                    </ul>
                </div>
                      <!-- تسجيل الخروج -->
                      <a class="dropdown-item text-light text-end pe-3 py-2" href="/admin/logout">
                        تسجيل الخروج
                        <i class="bi bi-box-arrow-in-left mx-1"></i>
                      </a>

                    </div>
                    </div>
                    <!-- Sidebar End -->
            @endif 

            {{-- مسؤول مخزن --}}
            @if(session()->get('user-data')->Role == "مسؤول مخزن")
              <!-- المخازن -->
              <div class="dropdown w-100 mb-2">
                <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                إدارة المخازن
                  <i class="bi bi-pin-map-fill"></i>
                </button>
                <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                  <li><a class="dropdown-item text-light" href="{{route('inventory.create')}}">
                      تسجيل صنف
                      <i class="bi bi-file-earmark-plus mx-1"></i>
                    </a></li>
                  <li><a class="dropdown-item text-light" href="{{route('cars.index')}}">
                      بحث فى المخازن
                      <i class="bi bi-pie-chart-fill mx-1"></i>
                    </a></li>
                </ul>
                </div>
                  <!-- تسجيل الخروج -->
                  <a class="dropdown-item text-light text-end pe-3 py-2" href="/admin/logout">
                    تسجيل الخروج
                    <i class="bi bi-box-arrow-in-left mx-1"></i>
                  </a>
                </div>
              </div>
                <!-- Sidebar End -->
            @endif
            {{-- مشتريات --}}
            @if(session()->get('user-data')->Role == "مشتريات")
                          <!-- المشتريات -->
                          <div class="dropdown w-100 mb-2">
                            <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            إدارة المشتريات
                              <i class="bi bi-pin-map-fill"></i>
                            </button>
                            <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #101733;">
                              <li><a class="dropdown-item text-light" href="{{route('purchases.create')}}">
                                  تسجيل أمر شراء
                                  <i class="bi bi-coin mx-1"></i>
                                </a></li>
                              <li><a class="dropdown-item text-light" href="{{route('cars.index')}}">
                                  بحث فى اوامر الشراء
                                  <i class="bi bi-pie-chart-fill mx-1"></i>
                                </a></li>
                            </ul>
                        </div>
                  <!-- تسجيل الخروج -->
                  <a class="dropdown-item text-light text-end pe-3 py-2" href="/admin/logout">
                    تسجيل الخروج
                    <i class="bi bi-box-arrow-in-left mx-1"></i>
                  </a>
                </div>
              </div>
                <!-- Sidebar End -->
            @endif

             

    @endif
 