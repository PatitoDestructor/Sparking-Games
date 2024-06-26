<?php

session_start();
session_destroy();

echo "<script>alert(\"Se ha cerrado sesion exitosamente.\");
window.location.href = \"../../inicio.php\";
</script>";
?>