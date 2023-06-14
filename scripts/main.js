var sidenav = document.getElementById("sidenav");
var header = document.getElementById("header");
var main = document.getElementById("main");
var aside = document.getElementById("aside");


function sidenavHandler(sidenav){
    let login = document.createElement("login");
    login.innerHTML = load("login.html");

};


function darkmode() {
    var element = document.body;
    element.classList.toggle("dark-mode");
  } 