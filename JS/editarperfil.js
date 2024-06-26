//Ver Contraseña
const visible = document.getElementById("visible");

visible.addEventListener("click", toggleVisible);

function toggleVisible() {
    let contraseña = document.getElementById("password-1");
    const icono = document.getElementById("icono");

    icono.classList.toggle("fa-eye-slash");
    
    if (contraseña.type === "password") {
        contraseña.type = "text";
    }
    else{
        contraseña.type = "password";
    }
}

//Validacion
const btnform = document.getElementById("btnform");

btnform.addEventListener("click", function(e) {
    const nombre = document.getElementById("nombre").value;
    const usuario = document.getElementById("usuario").value;
    const contraseña = document.getElementById("password-1").value;
    const contraseña2 = document.getElementById("password-2").value;
    const foto = document.getElementById("foto").value; 
    const form = document.getElementById("form");
    

    //Nombre
    if (nombre == "") {
        document.getElementById("biennombre").style.visibility="hidden"
        document.getElementById("malnombre").style.visibility="visible";
        document.getElementById("mensajenombre").style.visibility="visible";
        document.getElementById("nombre").style.border="1px solid red";
        e.preventDefault();
    }else{
        document.getElementById("malnombre").style.visibility="hidden";
        document.getElementById("mensajenombre").style.visibility="hidden";
        document.getElementById("biennombre").style.visibility="visible"
        document.getElementById("nombre").style.border="1px solid #2ecc71";
    }

    //Usuario
    if (usuario == "") {
        document.getElementById("bienusuario").style.visibility="hidden"
        document.getElementById("malusuario").style.visibility="visible";
        document.getElementById("mensajeusuario").style.visibility="visible";
        document.getElementById("usuario").style.border="1px solid red";
        e.preventDefault();
    }else{
        document.getElementById("malusuario").style.visibility="hidden";
        document.getElementById("mensajeusuario").style.visibility="hidden";
        document.getElementById("bienusuario").style.visibility="visible"
        document.getElementById("usuario").style.border="1px solid #2ecc71";
    }

    //contraseña
    const expcontraseña = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,20}[^'\s]$/;
    let contraseñaOK = expcontraseña.test(contraseña);

    if (contraseñaOK == false) {
        document.getElementById("biencontra").style.visibility="hidden"
        document.getElementById("contravalired").style.visibility="visible";
        document.getElementById("mensajecontra").style.visibility="visible";
        document.getElementById("password-1").style.border="1px solid red";
        e.preventDefault();
    }else{
        document.getElementById("contravalired").style.visibility="hidden";
        document.getElementById("mensajecontra").style.visibility="hidden";
        document.getElementById("biencontra").style.visibility="visible"
        document.getElementById("password-1").style.border="1px solid #2ecc71";
    }

    //Repetir contraseña
    if(contraseña2 !== contraseña || contraseña2 == ""){
        document.getElementById("biencontra2").style.visibility="hidden"
        document.getElementById("malcontra2").style.visibility="visible";
        document.getElementById("mensajecontra2").style.visibility="visible";
        document.getElementById("password-2").style.border="1px solid red";
        e.preventDefault();
    }else{
        document.getElementById("malcontra2").style.visibility="hidden";
        document.getElementById("mensajecontra2").style.visibility="hidden";
        document.getElementById("biencontra2").style.visibility="visible"
        document.getElementById("password-2").style.border="1px solid #2ecc71";
    }

    //Foto
    if (foto == "") {
        document.getElementById("bienfoto").style.visibility="hidden"
        document.getElementById("malfoto").style.visibility="visible";
        document.getElementById("mensajefoto").style.visibility="visible";
        document.getElementById("foto").style.border="1px solid red";
        e.preventDefault();
    } else{
        document.getElementById("malfoto").style.visibility="hidden";
        document.getElementById("mensajefoto").style.visibility="hidden";
        document.getElementById("bienfoto").style.visibility="visible"
        document.getElementById("foto").style.border="1px solid #2ecc71";
    }

});

//Validar Archivo
function validarFile(){
    let archivoInput = document.getElementById("foto");
    let archivoRuta = archivoInput.value;
    let extPermitidas = /(.jpg|.JPG|.png|.PNG|.JPEG|.jpeg)$/i;

    if(!extPermitidas.exec(archivoRuta)){

        alert("Asegurate de haber seleccionado un archivo JPG o PNG");
        archivoInput.value="";
        return false;

    }else{

        if(archivoInput.files && archivoInput.files[0]){

            let visor = new FileReader();
            visor.onload=function(e){
                document.getElementById("visorarchivo").innerHTML=
                `<embed src='${e.target.result}' width = "70px" height = "70px">`;
            }
            visor.readAsDataURL(archivoInput.files[0]);

        }

    }
}