// let sideBar = new Utilites().sidebar();

let inputs = document.querySelectorAll("input");

let date = new Date().toISOString().split("T")[0];

inputs[7].value = date

console.log(inputs);
// $( "input#name" ).autocomplete({
//     source: [
//         {label:"كريم على حسن",value:"كريم على حسن"},
//         {label:"محمود سمير حسين",value:"محمود سمير حسين"},
//         {label:"محمد سيد عبدالعال",value:"محمد سيد عبدالعال"},
//         {label:"إبراهيم الكامل على",value:"إبراهيم الكامل على"},

    
//     ]
//   });

let imgInput = document.querySelector("input[type=file]");
let imgArea = document.querySelector("img.player-img");

imgInput.addEventListener("change",(e)=>{
  console.log("hello");
   let Url = URL.createObjectURL(e.target.files[0]);
    imgArea.src = Url;

});


inputs[2].addEventListener("change",(e)=>{
  let Validate = new Validator().validateArabicNameText(e);
  console.log(inputs);
});
inputs[3].addEventListener("change",(e)=>{
  let Validate = new Validator().validateAge(e);
});
inputs[4].addEventListener("change",(e)=>{
  let Validate = new Validator().validatePhone(e);
});
inputs[5].addEventListener("change",(e)=>{
  let Validate = new Validator().validatePhone(e);
});
inputs[6].addEventListener("change",(e)=>{
  let Validate = new Validator().validateAddress(e);
});
inputs[8].addEventListener("change",(e)=>{
  let Validate = new Validator().validateDouble(e);
});

inputs[9].addEventListener("change",(e)=>{
  let Validate = new Validator().validateDouble(e);
});

inputs[10].addEventListener("change",(e)=>{
  let Validate = new Validator().validateLink(e);
});

