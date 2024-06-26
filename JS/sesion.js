const visible = document.getElementById("visible");

visible.addEventListener("click", toggleVisible);

function toggleVisible() {
    const contraseña = document.getElementById("password-1");
    const icono = document.getElementById("icono");

    icono.classList.toggle("fa-eye-slash");
    
    if (contraseña.type === "password") {
        contraseña.type = "text";
    }
    else{
        contraseña.type = "password";
    }
};

//Validacion
const boton = document.getElementById("btnenviar");

boton.addEventListener("click", function(e){
    const usuario = document.getElementById("usuario").value;
    const contraseña = document.getElementById("password-1").value;

    //usuario
    if (usuario == "") {
        document.getElementById("bienusuario").style.visibility="hidden";
        document.getElementById("malusuario").style.visibility = "visible";
        document.getElementById("mensajeusuario").style.visibility = "visible";
        document.getElementById("usuario").style.border = "1px solid red";
        e.preventDefault();
    }else{
        document.getElementById("malusuario").style.visibility = "hidden";
        document.getElementById("mensajeusuario").style.visibility = "hidden";
        document.getElementById("bienusuario").style.visibility="visible";
        document.getElementById("usuario").style.border = "1px solid #2ecc71";
    }

    //contraseña
    if (contraseña == "") {
        document.getElementById("biencontra").style.visibility="hidden";
        document.getElementById("malcontra").style.visibility = "visible";
        document.getElementById("mensajecontra").style.visibility = "visible";
        document.getElementById("password-1").style.border = "1px solid red";
        e.preventDefault();
    }else{
        document.getElementById("malcontra").style.visibility = "hidden";
        document.getElementById("mensajecontra").style.visibility = "hidden";
        document.getElementById("biencontra").style.visibility="visible";
        document.getElementById("password-1").style.border = "1px solid #2ecc71";
    }
});