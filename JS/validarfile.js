//Validar Archivo
function validararchivo() {

    let archivoInput = document.getElementById("foto");
    let archivoRuta = archivoInput.value;
    let extPermitidas = /(.jpg|.JPG|.png|.PNG|.jpeg|.JPEG|.jfif|.JFIF)$/i;

    if (!extPermitidas.exec(archivoRuta)) {

        alert("Asegurate de haber seleccionado un archivo JPG o PNG");
        archivoInput.value = "";
        return false;

    } else {

        if (archivoInput.files && archivoInput.files[0]) {

            let visor = new FileReader();
            visor.onload = function (e) {
                document.getElementById("visorarchivo").innerHTML =
                    `<embed src='${e.target.result}' width = "70px" height = "70px">`;
            };
            visor.readAsDataURL(archivoInput.files[0]);

        }

    }
}