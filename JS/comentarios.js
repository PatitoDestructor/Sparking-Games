const btnComentario = document.getElementById("btncomentario");

btnComentario.addEventListener("Click", function(e){
    const comentario = document.getElementById("comentario").value;

    if (comentario == ""){
        document.getElementById("malicono").style.visibility = "visible";
        document.getElementById("mensajecomentario").style.visibility = "visible";
        document.getElementById("comentario").style.border = "2px solid red";
        e.preventDefault();
    }else{
        document.getElementById("malicono").style.visibility = "hidden";
        document.getElementById("mensajecomentario").style.visibility = "hidden";
        document.getElementById("comentario").style.border = "2px solid white";
    }
});