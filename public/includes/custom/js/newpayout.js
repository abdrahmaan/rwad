let sideBar = new Utilites().sidebar();

let inputs = document.querySelectorAll("input");
let textareaa = document.querySelectorAll("textarea");

let date = new Date().toISOString().split("T")[0];

inputs[1].value = date;


textareaa[0].addEventListener("change", (e)=>{
let validate = new Validator().validateByan(e);
});


inputs[0].addEventListener("change", (e)=>{
let validate = new Validator().validateNumberInt(e);
});