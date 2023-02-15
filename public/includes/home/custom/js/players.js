let header = new Utilites().header();



// let Area = document.querySelector("#players-collection");
let btn = document.querySelector("button.btn-search");
data = [];

fetch(`http://ecoach.egy/api/admin/players`)
.then(res => res.json())
.then(res =>{
    data = res.response;
});


btn.addEventListener("click",(e)=>{
    let Area = document.querySelector("#players-collection");

    let InputName =document.querySelectorAll("input")[0].value;

    let counter = 0;

    Area.innerHTML = "";

    if(InputName !== ""){
        
    data.forEach(player => {
        console.log(player);
            if(player.PlayerName.includes(InputName)){
                let PlayerHTML = `
                <div class="player bg-dark col-12 col-lg-5 p-0  mx-2 my-3 d-flex justify-content-between align-items-center">
                
                <div class="player-img w-50 h-100">
                    <a href="">
                        <img src="${player.ImagePath == null ? `/includes/img/bg-section.jpg` : `/playerimages/${player.ImagePath}` }" alt="player_photo">
                    </a>
                </div>
                <div class="one-player-data d-flex flex-column justify-content-center align-items-center h-100 w-50 pt-4">
                    <span class="text-dark bg-warning mb-2 p-2 rounded">${player.Position}</span>
                    <h4 class="text-warning text-center">${player.PlayerName}</h4>
                    <h5 class="text-light my-3">
                        ${player.CategoryName}
                        <i class="bi bi-person-fill"></i>
                    </h5>
                   <div class="d-flex my-2   mt-3">
                        <h5 class="text-light mx-2">
                        <i class="bi bi-pass-fill"></i>
                            PHY : 50
                        </h5>
                        <h5 class="text-light mx-2">
                        <i class="bi bi-pass-fill"></i>
                             PAS : 50
                        </h5>
                   </div>
                   <div class="d-flex my-2   mb-3">
                        <h5 class="text-light mx-2">
                        <i class="bi bi-pass-fill"></i>
                            SHO : 50
                        </h5>
                        <h5 class="text-light mx-2">
                        <i class="bi bi-pass-fill"></i>
                             DEF : 50
                        </h5>
                   </div>

                    <a href="/admin/players/${player.id}" class="btn btn-warning mt-3">
                        ملف اللاعب
                        <i class="bi bi-skip-start-fill"></i>

                    </a>
                </div>
            </div> 
                
                `;
                Area.innerHTML += PlayerHTML ;
                counter++;
            }
    });

    if(counter > 0){

        let Area = document.querySelector("#players-collection");
        
        Area.className.includes("d-none") ? Area.classList.remove("d-none") : null; 

    }  else {

        Swal.fire({
            icon: "info",
            title: "لا يوجد بيانات",
            confirmButtonText: "رجوع",
             confirmButtonColor: "#e01a22",
        })
        Area.className.includes("d-none") ?  null : Area.classList.remove("d-none") ; 
        
    }
    }

})