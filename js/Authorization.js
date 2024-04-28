let showPassword = document.querySelector(".sauron-div");
let passinput = document.querySelector(".passinput");

showPassword.addEventListener("click",function(e){
    if(passinput.type === "password"){
        passinput.type = "text";
    }else{
        passinput.type = "password";
    }});