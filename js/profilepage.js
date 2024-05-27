
let loginform = document.getElementById("login");
let register = document.getElementById("register");
function login(){
    loginform.style.display = "flex";
    register.style.display = "none"
}


function registerBtn(){
    register.style.display = "flex"
    loginform.style.display = "none";
}

