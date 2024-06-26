let activador = document.getElementById("activador");

activador.addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("menu").classList.toggle('menu-vertical-ver');
})

let activador2 = document.getElementById("activador2");

activador2.addEventListener("click", function(e){
    e.preventDefault();
    document.getElementById("menu-admin").classList.toggle('menu-vertical2-ver');
})