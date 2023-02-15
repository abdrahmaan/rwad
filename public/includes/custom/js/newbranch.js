let sideBar = new Utilites().sidebar();

let inputs = document.querySelectorAll("input");

let btnAdd = document.querySelector("button.add-branch");




inputs[0].addEventListener("change",(e)=>{

   let Validate = new Validator().validateArabicText(e);
});



