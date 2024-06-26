let btn = document.getElementById("btnform");

btn.addEventListener("click", function(e) {
    let titulo = document.getElementById("titulo").value;
    let sinopsis = document.getElementById("sinop").value;
    let contenido = document.getElementById("contenido").value;
    let foto = document.getElementById("foto").value;

    //Titulo
    if (titulo == ""){
        document.getElementById("bientitulo").style.visibility="hidden";
        document.getElementById("maltitulo").style.visibility="visible";
        document.getElementById("mensajetitulo").style.visibility="visible";
        document.getElementById("titulo").style.border="1px solid red";
        e.preventDefault();
    }else{
        document.getElementById("maltitulo").style.visibility="hidden";
        document.getElementById("mensajetitulo").style.visibility="hidden";
        document.getElementById("bientitulo").style.visibility="visible";
        document.getElementById("titulo").style.border="1px solid green";
    }

    //sinopsis
    if(sinopsis == ""){
        document.getElementById("biensinop").style.visibility="hidden";
        document.getElementById("malsinop").style.visibility="visible";
        document.getElementById("mensajesinop").style.visibility="visible";
        document.getElementById("sinop").style.border="1px solid red";
        e.preventDefault();
    }else{
        document.getElementById("malsinop").style.visibility="hidden";
        document.getElementById("mensajesinop").style.visibility="hidden";
        document.getElementById("biensinop").style.visibility="visible";
        document.getElementById("sinop").style.border="1px solid green";
    }

    //contenido
    if(contenido == ""){
        document.getElementById("biencontenido").style.visibility="hidden";
        document.getElementById("malcontenido").style.visibility="visible";
        document.getElementById("mensajecontenido").style.visibility="visible";
        document.getElementById("contenido").style.border="1px solid red";
        e.preventDefault();
    }else{
        document.getElementById("malcontenido").style.visibility="hidden";
        document.getElementById("mensajecontenido").style.visibility="hidden";
        document.getElementById("biencontenido").style.visibility="visible";
        document.getElementById("contenido").style.border="1px solid green";
    }

      //Foto
      if (foto == "") {
        document.getElementById("malfoto").style.visibility="visible";
        document.getElementById("mensajefoto").style.visibility="visible";
        document.getElementById("foto").style.border="1px solid red";
        e.preventDefault();
    } else{
        document.getElementById("malfoto").style.visibility="hidden";
        document.getElementById("mensajefoto").style.visibility="hidden";
        document.getElementById("foto").style.border="1px solid green";
    }

});