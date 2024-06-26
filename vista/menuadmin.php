<head>
    <link rel="stylesheet" href="CSS/menus.css">
</head>

<nav class="navegador">
            <a href="index.php"><img src="Media/IMG/Logo.png" alt="Logo" class="nav-logo"></a>
            <ul class="nav-menu">
                <li>
                    <a href="inicio.php"><i class="fas fa-home"></i>    Inicio</a>
                </li>
                <li>
                    <a href="Biblioteca.php"><i class="fas fa-book"></i>        Biblioteca</a>
                </li>
                <li>
                    <a href="AgregarGuia.php"><i class="fa-solid fa-folder-plus"></i>         Subir Guia</a>
                </li>
                <li>
                    <a href="Nosotros.php"><i class="fas fa-users"></i>         Nosotros</a>
                </li>
                <li>
                    <a href="Sugerencias.php"><i class="fas fa-plus-circle"></i>      Sugerencias</a>
                </li>
                <li id="activador2">
                    <a href="#"><i class="fa-solid fa-screwdriver-wrench"></i>     Administrar</a>
                </li>
                <ul class="menu-vertical2" id="menu-admin">
                    <li><a href="administracion.php">Usuarios&nbsp;<i class="fa-solid fa-user"></i></a></li>
                    <li><p>|</p></li>
                    <li><a href="administracionguia.php">Guias&nbsp;<i class="fa-solid fa-book"></i></a></li>
                </ul>    
            </ul>

            <ul class="nav-menu-icon">
                <li>
                    <img class="fotoperfil" src="data:image/jpg;base64, <?php echo base64_encode($foto)?>">
                </li>
                <li>
                    <a href="#" id="activador"><?php echo $nombre; ?>&nbsp;<i class="fa-solid fa-crown"></i>&nbsp;&nbsp;<i class="fa-solid fa-angle-down"></i></a>
                </li>
                <ul class="menu-vertical" id="menu">
                    <li><a href="miperfil.php">Mi perfil&nbsp;<i class="fa-solid fa-pencil"></i></a></li>
                    <li><p>|</p></li>
                    <li><a href="controlador/ingreso/cerrar.php">Cerrar sesion&nbsp;<i class="fa-solid fa-right-from-bracket"></i></a></li>
                </ul>
            </ul>
        </nav>

