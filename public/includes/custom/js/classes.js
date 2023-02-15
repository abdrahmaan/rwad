class  Utilites {
    header(){

        let header = `
                    <header>
                    <div class="container">
                        <section class="social-media d-flex justify-content-between align-items-center flex-row-reverse">
                         
                            <a class="text-light" href="login.html">
                                تسجيل الدخول
                                <i class="bi bi-person-fill"></i>
                            </a>
                            
                            <div class="icon d-flex">
                                <a href="">
                                    <i class="bi bi-facebook text-light px-2"></i>
                                </a>
                                <a href="">
                                    <i class="bi bi-instagram text-light px-2"></i>
                                </a>
                                <a href="">
                                    <i class="bi bi-whatsapp text-light px-2"></i>
                                </a>
                            </div>
                    

                        </section>
                        <hr class="bg-light">
                        <section class="header-content flex-lg-row-reverse flex-column d-flex justify-content-between align-items-center ">
                            <h2 class="text-warning fs-1">الحريف</h2>
                            <ul class="nav d-flex flex-row-reverse">
                                <li id="index" class="active px-4 fs-5"><a href="index.html">
                                    الرئيسية
                                    <i class="bi bi-house-fill"></i>
                                </a>
                                </li>
                                <li id="players" class="px-4 fs-5"><a href="players.html">
                                    اللاعبين
                                    <i class="bi bi-person-lines-fill"></i>
                                </a>
                                </li>
                                <li id="about-us" class="px-4 fs-5"><a href="about-us.html">
                                    عن الأكاديمية
                                    <i class="bi bi-patch-question-fill"></i>
                                </a>
                                </li>
                                <li id="matches" class="px-4 fs-5"><a href="matches.html">
                                    المباريات
                                    <i class="bi bi-calendar-week-fill"></i>
                                </a>
                                </li>
                                <li id="news" class="px-4 fs-5"><a href="news.html">
                                    أخر الأخبار
                                    <i class="bi bi-newspaper"></i>
                                </a>
                                </li>
                            </ul>
                        </section>
                    </div>
                </header>
        `;

        let element = document.createElement("header");
        element.innerHTML += header;
        document.body.prepend(element);

        let path = window.location.pathname.split("/");

        let pageName = path[path.length - 1];

        let links = document.querySelectorAll("li");

        links.forEach(link => {
            if(pageName.includes(link.id)){
                link.classList.add("active");
            } else {
                link.classList.remove("active");
            }
        });
        

    }

    sidebar(){
        let sideBar = `
        <!-- Sidebar Start -->
        <div class="offcanvas offcanvas-end bg-dark" data-bs-backdrop="true" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header my-2 d-flex flex-row-reverse align-items-center ">
            <h5 class="offcanvas-title text-warning" id="offcanvasBottomLabel">القائمة الرئيسية</h5>
            <button type="button" class="btn-close text-reset text-light bg-warning m-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <img src="/includes/img/user.png" style="max-width: 220px; margin: auto;" alt="">
        <h4 class="username text-warning text-center my-3">Admin أهلاً بك</h4>
        <hr class="dropdown-divider bg-warning w-100 mx-auto" style="min-height: 2px;">
        <div class="offcanvas-body d-flex flex-column align-items-end px-0">
            <!-- الإحصائيات -->
            <a class="dropdown-item text-light text-end pe-3 py-2" href="index.html">
                الإحصائيات
                <i class="bi bi-graph-up-arrow mx-1"></i>
              </a>
            <!-- اللاعبين -->
            <div class="dropdown w-100 mb-2">
                <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  إدارة اللاعبين
                  <i class="bi bi-person-lines-fill"></i>
                </button>
                <ul class="dropdown-menu  w-100 position-relative text-end rounded-0" style="background-color: #161819;">
                  <li><a class="dropdown-item text-light" href="newplayer.html">
                      تسجيل لاعب جديد
                      <i class="bi bi-person-fill mx-1"></i>
                    </a></li>
                  <li><a class="dropdown-item text-light" href="newplayer.html">
                      بيانات اللاعبين
                      <i class="bi bi-pie-chart-fill mx-1"></i>
                    </a></li>
                    <li><a class="dropdown-item text-light" href="groups.html">
                        إدارة المجموعات
                        <i class="bi bi-collection-fill mx-1"></i>
                      </a></li>
                  
                </ul>
            </div>
            <!-- المهارات -->
            <div class="dropdown w-100 mb-2">
                <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  المهارات
                  <i class="bi bi-clipboard2-data-fill"></i>
                </button>
                <ul class="dropdown-menu w-100 position-relative text-end rounded-0" style="background-color: #161819;">
                  <li><a class="dropdown-item text-light" href="#">
                      تسجيل مهارات لاعب
                      <i class="bi bi-graph-up-arrow mx-1"></i>
                    </a></li>
                </ul>
            </div>
            <!-- الحضور والغياب -->
            <div class="dropdown w-100 mb-2">
                <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                    الحضور والغياب
                  <i class="bi bi-table"></i>
                </button>
                <ul class="dropdown-menu w-100 position-relative text-end rounded-0" style="background-color: #161819;">
                  <li><a class="dropdown-item text-light" href="#">
                      تسجيل حضور
                      <i class="bi bi-calendar-check-fill mx-1"></i>
                    </a></li>
                  <li><a class="dropdown-item text-light" href="#">
                      مراجعة الحضور والغياب
                      <i class="bi bi-ui-checks mx-1"></i>
                    </a></li>
                </ul>
            </div>
            <!-- المباريات -->
            <div class="dropdown w-100 mb-2">
                <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                    المباريات
                    <i class="bi bi-globe"></i>
                </button>
                <ul class="dropdown-menu w-100 position-relative text-end rounded-0" style="background-color: #161819;">
                    <li><a class="dropdown-item text-light" href="#">
                        تسجيل مباراة
                        <i class="bi bi-pen-fill mx-1"></i>
                    </a></li>
                    <li><a class="dropdown-item text-light" href="#">
                        مراجعة المباريات
                        <i class="bi bi-bullseye mx-1"></i>
                    </a></li>
                </ul>
            </div>
            <!-- الإشتراكات -->
            <div class="dropdown w-100 mb-2">
                <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                    الإشتراكات
                  <i class="bi bi-currency-dollar"></i>
                </button>
                <ul class="dropdown-menu w-100 position-relative text-end rounded-0" style="background-color: #161819;">
                  <li><a class="dropdown-item text-light" href="newpayment.html">
                     تسجيل إشتراك لاعب
                      <i class="bi bi-coin mx-1"></i>
                    </a></li>
                  <li><a class="dropdown-item text-light" href="#">
                      مراجعة الإشتراكات
                      <i class="bi bi-table mx-1"></i>
                    </a></li>
                </ul>
            </div>
            <!-- المصروفات -->
            <div class="dropdown w-100 mb-2">
                <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                    المصروفات
                  <i class="bi bi-currency-dollar"></i>
                </button>
                <ul class="dropdown-menu w-100 position-relative text-end rounded-0" style="background-color: #161819;">
                  <li><a class="dropdown-item text-light" href="newpayout.html">
                      تسجيل مصروف
                      <i class="bi bi-coin mx-1"></i>
                    </a></li>
                  <li><a class="dropdown-item text-light" href="#">
                      مراجعة المصروفات
                      <i class="bi bi-table mx-1"></i>
                    </a></li>
                </ul>
            </div>
            <!-- الإعدادات -->
            <div class="dropdown w-100 mb-2">
                <button class="btn text-light dropdown-toggle text-end w-100 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                    الإعدادات
                  <i class="bi bi-gear-wide-connected"></i>
                </button>
                <ul class="dropdown-menu w-100 position-relative text-end rounded-0" style="background-color: #161819;">
                  <li><a class="dropdown-item text-light" href="#">
                      الحسابات
                      <i class="bi bi-person-fill mx-1"></i>
                    </a></li>
                    <li><a class="dropdown-item text-light" href="#">
                        فريق العمل
                        <i class="bi bi-person-workspace mx-1"></i>
                      </a></li>
                    <li><a class="dropdown-item text-light" href="branches.html">
                        فروع الأكاديمية
                        <i class="bi bi-collection-fill mx-1"></i>
                      </a></li>
                </ul>
            </div>
             <!-- تسجيل الخروج -->
             <a class="dropdown-item text-light text-end pe-3 py-2" href="https://www.google.com" target="_blank">
                تسجيل الخروج
                <i class="bi bi-box-arrow-in-left mx-1"></i>
              </a>

           
        <hr class="dropdown-divider d-none bg-warning w-50 my-3" style="min-height: 1px;">

           
        </div>
        </div>
        <!-- Sidebar End -->
        `;

        let element = document.createElement("section");
        element.innerHTML += sideBar

        document.body.prepend(element);
        

    }
}


class Validator {

    validateArabicText(e){
        let ArabicRegex = /[^ء-ي\s]/;
        let Text = e.target.value;
        if(Text.match(ArabicRegex) !== null){
            Swal.fire({
                icon: "error",
                title: "! تنبيه",
                text: "برجاء الكتابة باللغة العربية فقط",
                confirmButtonText: "رجوع",
                confirmButtonColor: "#e01a22",
            });
            e.target.value = "";
        }
    }

    validateArabicNameText(e){
        let ArabicRegex = /[^ء-ي\s]/;
        let Text = e.target.value;
        let SplitedText = Text.split(" ");
        if(Text.match(ArabicRegex) !== null){
            Swal.fire({
                icon: "error",
                title: "! تنبيه",
                text: "برجاء كتابة الإسم ثلاثى باللغة العربية",
                confirmButtonText: "رجوع",
                confirmButtonColor: "#e01a22",
            });
            e.target.value = "";
        } else if(Text.split(" ").length < 3 || SplitedText[SplitedText.length -1].length < 1 ) {
            Swal.fire({
                icon: "error",
                title: "! تنبيه",
                text: "برجاء كتابة الإسم ثلاثى كامل",
                confirmButtonText: "رجوع",
                confirmButtonColor: "#e01a22",
            });
            e.target.value = "";
        }
    }

    validateEnglishText(e){
        let EnglishText = /[^a-z\s]/i;
        let Text = e.target.value;
        if(Text.match(EnglishText) !== null){
            Swal.fire({
                icon: "error",
                title: "! تنبيه",
                text: "برجاء الكتابة باللغة الإنجليزية فقط",
                confirmButtonText: "رجوع",
                confirmButtonColor: "#e01a22",
            });
            e.target.value = "";
        }
    }

    validatePhone(e){
        let PhoneRegex = /01(0|1|2|5)\d{8}$/g;
        let Text = e.target.value;
        if(Text.match(PhoneRegex) == null){
            Swal.fire({
                icon: "error",
                title: "! تنبيه",
                text: "برجاء الكتابة رقم تيليفون صحيح",
                confirmButtonText: "رجوع",
                confirmButtonColor: "#e01a22",
            });
            e.target.value = "";
        }
    }

    validateAddress(e){
        let AddressRegex = /[^0-9ء-ي\s -]/;
        let Text = e.target.value;
        if(Text.match(AddressRegex) !== null){
            Swal.fire({
                icon: "error",
                title: "! تنبيه",
                text: "برجاء كتابة عنوان صحيح باللغة العربية",
                confirmButtonText: "رجوع",
                confirmButtonColor: "#e01a22",
            });
            e.target.value = "";
        }
    }

    validateByan(e){
        let AddressRegex = /[^0-9ء-ي\s -]/;
        let Text = e.target.value;
        if(Text.match(AddressRegex) !== null){
            Swal.fire({
                icon: "error",
                title: "! تنبيه",
                text: "مسموح بكتابة ( أحرف عربية - أرقام - رمز (-) ) فقط",
                confirmButtonText: "رجوع",
                confirmButtonColor: "#e01a22",
            });
            e.target.value = "";
        }
    }

    validateAge(e){
        let NumberRegex = /([^0-9])/;
        let Text = e.target.value;
        if(Text.match(NumberRegex) !== null || Text < 1 || Text > 99){
            Swal.fire({
                icon: "error",
                title: "! تنبيه",
                text: "برجاء كتابة سن صحيح",
                confirmButtonText: "رجوع",
                confirmButtonColor: "#e01a22",
            });
            e.target.value = "";
        }
    }

    validateNumberInt(e){
        let NumberRegex = /[^0-9]/;
        let Text = e.target.value;
        if(Text.match(NumberRegex) !== null || Text < 1){
            Swal.fire({
                icon: "error",
                title: "! تنبيه",
                text: "برجاء كتابة رقم صحيح",
                confirmButtonText: "رجوع",
                confirmButtonColor: "#e01a22",
            });
            e.target.value = "";
        } 
    }


    validateDouble(e){
        let DoubleRegex = /^[0-9]+.?[0-9]+$/;
        let Text = e.target.value;
        if(Text.match(DoubleRegex) == null){
            Swal.fire({
                icon: "error",
                title: "! تنبيه",
                text: "برجاء كتابة عدد ( عشرى أو صحيح )",
                confirmButtonText: "رجوع",
                confirmButtonColor: "#e01a22",
            });
            e.target.value = "";
        } 
    }

    validateLink(e){
        let LinkRegex = /^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/gm;
        let Text = e.target.value;
        if(Text.match(LinkRegex) == null){
            Swal.fire({
                icon: "error",
                title: "! تنبيه",
                text: "برجاء إضافة لينك فيديو يوتيوب صحيح",
                confirmButtonText: "رجوع",
                confirmButtonColor: "#e01a22",
            });
            e.target.value = "";
        } 
    }

    validatePhoto(){

    }

}

