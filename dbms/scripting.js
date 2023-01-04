function show(a){ 
    if(a==1){
        document.getElementById("about").style.display="none";
        document.getElementById("contact").style.display="none";
        document.getElementById("service").style.display="flex";
        document.getElementById("login_main").style.display="none";
    }
    if(a==2){
        document.getElementById("service").style.display="none";
        document.getElementById("contact").style.display="none";
        document.getElementById("about").style.display="flex";
        document.getElementById("login_main").style.display="none";
    }
    if(a==3){
        document.getElementById("about").style.display="none";
        document.getElementById("service").style.display="none";
        document.getElementById("contact").style.display="flex";
        document.getElementById("login_main").style.display="none";
    }
}

var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");

function register(){
x.style.left="-400px";
y.style.left="50px";
z.style.left="110px";
}
function login(){
x.style.left="50px";
y.style.left="450px";
z.style.left="0px";
}