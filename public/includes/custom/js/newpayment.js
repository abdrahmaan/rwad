let sideBar = new Utilites().sidebar();

let inputs = document.querySelectorAll("input");

let date = new Date().toISOString().split("T")[0];

inputs[3].value = date;


inputs[1].addEventListener("change", (e)=>{
 let validate = new Validator().validateArabicNameText(e);
});


inputs[2].addEventListener("change", (e)=>{
 let validate = new Validator().validateNumberInt(e);
});
