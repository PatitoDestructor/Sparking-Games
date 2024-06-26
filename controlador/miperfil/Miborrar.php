<?php 

//Validacion Borrar

if(empty($_REQUEST['id'])){
    header("Location:../../miperfil.php");
}else{
    require_once('../conexion.php');

    $idguia = $_REQUEST['id'];

    $query_delete = mysqli_query($conexion, "DELETE FROM guias WHERE idguia = $idguia");

    if($query_delete){
        echo "<script>alert(\"Tu Guia ha sido borrado exitosamente.\");
        window.location.href = \"../../miperfil.php\";
        </script>";
    }else{
        echo "<script>alert(\"Error al eliminar el usuario .\");
        window.location.href = \"../../miperfil.php\";
        </script>";
    }
}

?>