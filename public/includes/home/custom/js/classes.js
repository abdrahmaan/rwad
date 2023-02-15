class  Utilites {
    header(){

        let header = `
                <header>
                    <div class="container d-flex flex-column justify-content-center" style="min-height: 175px">
                        <section class="header-content flex-row-reverse d-flex justify-content-center align-items-center ">
                            <img width="100px" height="100px" src="/includes/img/logo.png" alt="logo"></img>
                            <ul class="nav d-flex flex-row-reverse">
                                <!-- <li id="login" class="active px-4 my-3 fs-5"><a href="/login">
                                     تسجيل الدخول
                                     <i class="bi bi-person-fill"></i>
                                 </a>
                            </ul> -->
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
}

