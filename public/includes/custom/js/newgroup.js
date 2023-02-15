// let sideBar = new Utilites().sidebar();

let inputs = document.querySelectorAll("input");

let btnAdd = document.querySelector("button.add-group");




inputs[0].addEventListener("change",(e)=>{

   let Validate = new Validator().validateArabicText(e);
});

// Handle Time
let Time = "12:00 مساء";


inputs[1].addEventListener("change",(e)=>{

    let Hour = e.target.value.split(":")[0];
    let Minutes = e.target.value.split(":")[1];

    if(Hour > 12){
         Time = `${Hour - 12}:${Minutes} مساء`;
    } else if(Hour == 12) {      
         Time = `${Hour}:${Minutes} مساء`;
    } else if(Hour == 00){
         Time = `12:${Minutes} صباحاً`;

    } else {  
         Time = `${Hour}:${Minutes} صباحاً`;
    }

});


// Handle Add Group

btnAdd.addEventListener("click",()=>{

let inputs = document.querySelectorAll("input");
let select = document.querySelectorAll("select");

let GroupName = `${inputs[0].value} - ${select[0].value} - ${Time}`;

console.log(GroupName);


})
