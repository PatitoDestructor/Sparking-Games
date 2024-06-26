// Cristian
let cerrarc = document.querySelectorAll("#x")[0];
let abrirc = document.querySelectorAll("#cris")[0];
let modalc = document.querySelectorAll(".modal")[0];
let modalcc = document.querySelectorAll(".modal-container")[0];

abrirc.addEventListener("click", function(e) {
    e.preventDefault();
    modalcc.style.opacity = "1";
    modalcc.style.visibility = "visible";
    modalc.classList.toggle("modal-close");

});

cerrarc.addEventListener("click", function() {
    modalc.classList.toggle("modal-close");
    
    setTimeout(function() {
        modalcc.style.opacity = "0";
        modalcc.style.visibility = "hidden";
    },850)
    
});

window.addEventListener("click", function(e){
    console.log(e.target)
    if (e.target == modalcc) {
        modalc.classList.toggle("modal-close");
    
        setTimeout(function() {
            modalcc.style.opacity = "0";
            modalcc.style.visibility = "hidden";
        },850)
    }
});


//Evelin

let cerrare = document.getElementById("e");
let abrire = document.getElementById("eve");
let modale = document.getElementById("md");
let modalce = document.getElementById("mdc");

abrire.addEventListener("click", function(e) {
    e.preventDefault();
    modalce.style.opacity = "1";
    modalce.style.visibility = "visible";
    modale.classList.toggle("modal-close");

});

cerrare.addEventListener("click", function() {
    modale.classList.toggle("modal-close");
    
    setTimeout(function() {
        modalce.style.opacity = "0";
        modalce.style.visibility = "hidden";
    },850)
    
});

window.addEventListener("click", function(e){
    console.log(e.target)
    if (e.target == modalce) {
        modale.classList.toggle("modal-close");
    
        setTimeout(function() {
            modalce.style.opacity = "0";
            modalce.style.visibility = "hidden";
        },850)
    }
});


//Raul

let cerrarr = document.getElementById("r");
let abrirr = document.getElementById("raul");
let modalr = document.getElementById("modalr");
let modalcr = document.getElementById("modalcr");

abrirr.addEventListener("click", function(e) {
    e.preventDefault();
    modalcr.style.opacity = "1";
    modalcr.style.visibility = "visible";
    modalr.classList.toggle("modal-close");

});

cerrarr.addEventListener("click", function() {
    modalr.classList.toggle("modal-close");
    
    setTimeout(function() {
        modalcr.style.opacity = "0";
        modalcr.style.visibility = "hidden";
    },850)
    
});



//Daniel

let cerrarD = document.getElementById("d");
let abrirD = document.getElementById("dan");
let modalD = document.getElementById("modaldani");
let modalcD = document.getElementById("modalcontd");

abrirD.addEventListener("click", function() {
    modalcD.style.opacity = "1";
    modalcD.style.visibility = "visible";
    modalD.classList.toggle("modal-close");

});

cerrarD.addEventListener("click", function() {
    modalD.classList.toggle("modal-close");
    
    setTimeout(function() {
        modalcD.style.opacity = "0";
        modalcD.style.visibility = "hidden";
    },850)
    
});

window.addEventListener("click", function(e){
    console.log(e.target)
    if (e.target == modalcD) {
        modalD.classList.toggle("modal-close");
    
        setTimeout(function() {
            modalcD.style.opacity = "0";
            modalcD.style.visibility = "hidden";
        },850)
    }
});