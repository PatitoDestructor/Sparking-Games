<?php

session_start();

if(isset($_SESSION['idusuario'])){


$usuario = $_SESSION['usuario'];
$nombre = $_SESSION['nombrecompleto'];
$foto = $_SESSION['foto'];
$perfil = $_SESSION['perfil'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pipipupuchek || Resident Evil 4 </title>
    <link rel="icon" href="../Media/IMG/Logo.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/resident.css">
    <link rel="stylesheet" href="../CSS/Estilo.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Stick+No+Bills:wght@200;300;400&display=swap" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>
<body>

<!-- Loader -->
<div class="loader" id="loader">
    <div class="spinner">
        <span>L</span>
        <span>O</span>
        <span>A</span>
        <span>D</span>
        <span>I</span>
        <span>N</span>
        <span>G</span>
    </div>
</div>

<!-- Menu -->
<div class="contenedor">
    <nav class="navegador">
        <a href="index.php"><img src="../Media/IMG/Logo.png" alt="Logo" class="nav-logo"></a>
        <ul class="nav-menu">
            <li>
                <a href="../inicio.php"><i class="fas fa-home"></i>    Inicio</a>
            </li>
            <li>
                <a href="../Inicia sesion.php"><i class="fas fa-user"></i>     Inicia Sesion</a>
            </li>
            <li>
                <a href="../Registrate.php"><i class="fas fa-user-plus"></i>       Registrate</a>
            </li>
            <li>
                <a href="../Biblioteca.php"><i class="fas fa-book"></i>        Biblioteca</a>
            </li>
            <li>
                <a href="../Nosotros.php"><i class="fas fa-users"></i>         Nosotros</a>
            </li>
            <li>
                <a href="../Sugerencias.php"><i class="fas fa-plus-circle"></i>      Sugerencias</a>
            </li>
            
        </ul>
        <ul class="nav-menu-icon">
            <li>
                <section class="search">
                    <form autocomplete="off" class="formsearch">
                        <div class="divsearch">
                            <input type="text" name="q" placeholder="Buscar" class="inputsearch"><i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </form>
                </section>
            </li>
        </ul>
    </nav>
<hr>

<!-- Social bar -->
<div class="container">
    <input type="checkbox" id="btn-mas">
    <div class="redes">
        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#"><i class="fa-brands fa-twitter"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
        <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
    </div>
    <div class="btn-mas">
        <label for="btn-mas" class="icon-mas2"><i class="fa-solid fa-plus"></i></label>
    </div>
</div>


    <!-- Mural -->
    <header>
        <img src="../Media/IMG/noticia6.jpg" class="bannerh">
        <p class="logoh">Resident Evil 4</p>
    </header>

    <!-- Recorrido -->
    <nav class="recorrido">
        <h1>Recorrido Principal</h1>
        <ul>
            <li><h3>Informacion del juego</h3></li>
            <a href="#informacion"><li>Informacion</li></a>

            <li><h3>Introduccion</h3></li>
            <a href="#introduccion"><li>Introduccion</li></a>

            <li><h3>Contenido</h3></li>
            <a href="#dificultad"><li>Dificultad Gradual</li></a><br>
            <a href="#ashley"><li>Cuidar Siempre de Ashley</li></a><br>
            <a href="#buhonero"><li>El Buhonero</li></a><br>
            <a href="#armas"><li>Combinar armas y guardar munición</li></a><br>
            <a href="#curacion"><li>Hierbas curativas ¿para qué sirven y cómo combinarlas?</li></a><br>
            <a href="#plagas"><li>Las plagas</li></a>
            <br>

            <li><h3>Descarga</h3></li>
            <a href="#descarga"><li>Descarga (PC)</li></a>
        </ul>
    </nav>

    <!-- seccion -->
    <div class="contenedorA">
        <!-- informacion -->
        <div id="informacion">
            <h1>Informacion del juego</h1>
                <img src="IMG/Resident Evil 4/portada.jpg">
            <div class="text">
                <p><b>Plataforma:&nbsp;</b>Gamecube, Playstation 2, PC, Wii, Wii U, PlayStation 3, Xbox 360, PlayStation 4, Xbox One, Nintendo Switch</p><br>
                <p><b>Desarrollador:&nbsp;</b>Capcom</p><br>
                <p><b>Distribuidor:&nbsp;</b>Ubisoft</p><br>
                <p><b>Lanzamiento:&nbsp;</b>1 Marzo 2007</p>
            </div>
        </div>
        <!-- introduccion -->
        <div id="introduccion">
            <h1>Introduccion</h1>
            <p>¿Cómo jugar a Resident Evil 4? Te contamos todas las claves y consejos básicos. Resident Evil 4 no solo está considerado como uno de los mejores- para muchos el mejor- juego de la saga, sino también uno de los más difíciles. Con esta cuarta entrega, la saga dio un cambio radical hacia el género de acción, aunque sin olvidar algunos elementos básicos del survival horror: dificultad y puzzles. El título fue también el primero en introducir la cámara por encima del hombro y en ofrecer una mayor movilidad a su protagonista; cambios que revolucionaron la saga y se mantuvieron para la posterioridad. <br><br>
            Sin embargo, esta entrega también presenta una elevada dificultad. Así que, aprovechando que el remake puede estar más cerca que nunca, queremos daros unos consejos básicos sobre cómo jugar a Resident Evil 4 y no morir en el intento.
            </p><br><br>
            <img src="IMG/Resident Evil 4/poster1.webp">
        </div>
        <!-- Dificultad gradual -->
        <div id="dificultad">
            <h1>Dificultad Gradual</h1>
            <video src="IMG/Resident Evil 4/resident-evil-4-perro.mp4" controls></video><br><br>
            <p>Para empezar a jugar a Resident Evil 4, hay que tener en cuenta que se trata de un juego de acción y, todo sea dicho, bastante complicado. No solo por la dificultad en sí, sino por la cantidad ingente de enemigos que aparecen sin cesar, lo resistentes que son y las pocas «zonas de descanso» que nos encontramos. <a href="https://es.wikipedia.org/wiki/Shinji_Mikami">Shinji Mikami</a> se explayó en Resident Evil 4, ofreciendo un sinfín de partes complicadas, sin apenas bajar el ritmo entre unas y otras. Pero que no cunda el pánico. El juego cuenta con una dificultad gradual automática. Así que, si morimos mucho, Resident Evil 4 nos pondrá las cosas más fáciles. </p>
        </div>
        <!-- Cuidar siempre de Ashley -->
        <div id="ashley">
            <h1>Cuidar siempre de Ashley</h1>
            <p>Ashley es uno de esos personajes que siempre aparece en las listas de «personajes más pesados de la historia de los videojuegos». Y, creednos, aparece por méritos propios. No ayuda demasiado y es un blanco muy fácil para los enemigos. Pero eso no es lo peor de todo, sino que, como nuestra misión principal es rescatarla, si los enemigos consiguen llevársela, será el fin del juego. Así que tendremos que estar muy pendientes de cuidar de su salud y evitar, a toda costa, que la secuestren. Porque entonces estaremos perdidos. Para lograrlo, intentad llevar siempre un buen arsenal de hierbas combinadas (para ocupar menos espacio en el inventario), sparays y… huevos de gallina. Os podrán salvar la vida.</p><br><br>
            <img src="IMG/Resident Evil 4/ashley.jpg">
        </div>
        <!-- El papel del Buhonero -->
        <div id="buhonero">
            <h1>El papel del Buhonero</h1>
            <img src="IMG/Resident Evil 4/buhonero.webp"><br><br>
            <p>El Buhonero tiene un papel fundamental en el juego como mercader. Nos ofrecerá armas nuevas, mejoras de las ya existentes, chalecos antibalas, ampliación del inventario (imprescindible a medida que avancemos) y salud. Será muy importante que estemos pendientes de las mejoras que nos va ofreciendo, así como de las armas nuevas, porque necesitaremos mejorarlas si queremos que nuestra aventura sea algo más sencilla. Para eso, no podremos perderle ojo a los tesoros que nos encontremos por las zonas del mapa, ni a las joyas (que podrán insertarse en ellos y aumentar su valor). Todo ello con la finalidad de vendérselos al Buhonero y poder invertir en él, porque sus precios no son nada competitivos.</p>
        </div>
        <!-- Combinar armas y guardar munición -->
        <div id="armas">
            <h1>Combinar armas y guardar munición</h1>
            <p>En Resident Evil 4 no escaseará la munición, pero tendremos que ser espabilados. Si la sueltan los enemigos, desaparecerá pasado un tiempo, así que tendremos que hacernos con ella cuanto antes. También es posible que esté escondida en cajas, así que tendremos que recorrernos todas las localizaciones en su búsqueda. No habrá problema si se nos escapa algo, porque habrá más según avancemos el juego. Pero será mejor que no dejemos mucha por el camino, porque podremos tener problemas.</p><br><br>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/6uepJ6isOkU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <!-- Hierbas curativas ¿para qué sirven y cómo combinarlas? -->
        <div id="curacion">
            <h1>Hierbas curativas ¿para qué sirven y cómo combinarlas?</h1>
            <p>Los sprays curativos son una de los principales objetos que debemos tener en cuenta en nuestro inventario para sobrevivir a los momentos más tensos del juego. Pero también tenemos la opción de las plantas curativas, las cuales también podemos combinar no solo para reducir el número de objetos de nuestro inventario si no para crear una solución curativa. Pero ¿cómo combinar las hierbas curativas en Resident Evil?, estas son todas las combinaciones posibles:</p><br><br>
            <ul>
                <li><b>Hierba verde:</b>&nbsp;Restaura un 1/3 de salud.</li>
                <li><b>Hierba roja:</b>&nbsp; Sirve para mezclarla con la verde.</li>
                <li><b>Hierba azul:</b>&nbsp;Cura el envenenamiento.</li>
                <li><b>Hierba verde (x2):</b>&nbsp;Restaura el 2/3 de salud.</li>
                <li><b>Hierba verde (x3):</b>&nbsp;Restaura toda la salud.</li>
                <li><b>Hierba verde + Hierba roja:</b>&nbsp;Restaura toda la salud.</li>
                <li><b>Hierba verde + Hierba azul:</b>&nbsp;Restaura un 1/3 de salud y cura el envenenamiento.</li>
                <li><b>Hierba verde (x2) + Hierba azul:</b>&nbsp;Restaura 2/3 de salud y cura el veneno.</li>
                <li><b>Hierba roja + hierba verde + hierba azul:</b>&nbsp;Restaura toda la  salud y cura el envenenamiento.</li>
            </ul>
        </div>
        <!-- Las Plagas -->
        <div id="plagas">
            <h1>Las Plagas</h1>
            <img src="IMG/Resident Evil 4/plagas.gif"><br><br>
            <p>Las Plages son el virus de esta entrega y uno de los más peligrosos de toda la saga. Este parásito «zombifica» a sus víctimas en una primera fase, mostrando tal cuales son en la segunda. Las Plagas son un enemigo muy variado, así que tendremos que tener mucho cuidado con cada tipo de enemigo que encontremos. No será lo mismo el Dr. Salvador, que tendremos que esquivar para huir de su motosierra, que Garrador, un subjefe ciego que solo reacciona al ruido que Krauser, centrado únicamente en el cuerpo a cuerpo. En cualquier caso, para jugar a Resident Evil 4 y sobrevivir, os recomendamos encarecidamente: esquivar, la escopeta y el rifle de francotirador (mejorados). Y, si las cosas se tuercen, ahorrad para el lanzacohetes</p>
        </div>
        <!-- Descarga -->
        <div id="descarga">
            <h1>Descarga Resident Evil (PC)</h1>
            <p>Ya terminada la guia. Puedes descargar el Resident Evil para tu PC. <br>
            Estos son los requisitos:</p><br><br>
            <div class="requisitos">
                <h1>Requisitos del Sistema</h1>
                <div class="minimo">
                    <h3>Minimo:</h3><br>
                    <ul>
                        <li><b>SO:</b> Windows® 8 / Windows® 10</li>
                        <li><b>Procesador:</b> Intel® CoreTM2 Duo 2,4 GHz o superior, AMD AthlonTM X2 2,8 GHz o superior</li>
                        <li><b>Memoria: </b>2 GB de RAM</li>
                        <li><b>Gráficos: </b>NVIDIA® GeForce® 8800GTS o superior, ATI RadeonTM HD 4850 o superior</li>
                        <li><b>DirectX: </b> Versión 9.0c</li>
                        <li><b>Almacenamiento: </b>15 GB de espacio disponible</li>
                        <li><b>Tarjeta de sonido: </b> Dispositivo de sonido estándar</li>

                    </ul>
                </div>
                <div class="recomendado">
                    <h3>Recomendado:</h3><br>
                    <ul>
                        <li><b>SO: </b>Windows 8.1 / Windows® 10</li>
                        <li><b>Procesador:</b> Intel® CoreTM 2 Quad 2,7 GHz o superior, AMD PhenomTM II X4 3 GHz o superior</li>
                        <li><b>Memoria: </b> 4 GB de RAM</li>
                        <li><b> Gráficos:</b> NVIDIA® GeForce® GTX 560 o superior</li>
                        <li><b>DirectX:</b> Versión 9.0c</li>
                        <li><b>Almacenamiento:</b> 15 GB de espacio disponible</li>
                    </ul>
                </div>
            </div>
            <div class="descarga">
                <h1>Descargar</h1>
                <h3>(Se recomienda ver los videos, ya que los archivos tienen contraseña.)</h3>
                <a href="https://www.mediafire.com/file/u9wit6ke6jsjd83/Resident_evil_4_HD.rar/file"><img src="IMG/mediafire.png"></a>
                <a href="https://mega.nz/file/kFs1lBwb#L-pe9i03k0NB8ro5WCxVv9gSYtDxohKtQBrxKJTHunY"><img src="IMG/mega.png" class="mega"></a>
                
                <iframe width="310" height="187.5" src="https://www.youtube.com/embed/-S3hdXWUVcU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe width="310" height="187.5" src="https://www.youtube.com/embed/fyk3FeF2rl0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <!-- Comentarios -->
        <div id="comentarios">
            <h1>Comentarios</h1>
            <div class="comentario">
                <form action="">
                <img src="IMG/usuario.jpg">
                <input placeholder="Añade tu comentario aqui" class="input" name="text" type="text" id="comentario">
                <i class="fas fa-exclamation-circle" id="malicono"></i>
                <small id="mensajecomentario">No se puede enviar un Comentario vacio.</small>

                <button id="btncomentario" type="submit">
                    <div class="svg-wrapper-1">
                    <div class="svg-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                        </svg>
                    </div>
                    </div>
                    <span>Enviar</span>
                </button>
            </form>
            </div>
            <div class="comunidad">
                <h3>Comunidad:</h3>
            </div>
        </div>
    </div>
</div>

<!-- Footer-->
<footer class="pie-pagina">
    <div class="grupo-1">
        <div class="box">
            <figure>
                <a href="../index.php">
                    <img src="../Media/IMG/Logo.png" alt="logo" class="logo">
                </a>
            </figure>
        </div>
        <div class="box">
            <h2>SOBRE NOSOTROS</h2>
            <p>Jovenes emprendedores con objetivos claros y concretos.</p>
            <p>¿Quieres saber mas sobre nosotros y como aportamos al sitio web? <a href="../nosotros.php"><b>Ver mas...</b></a></p>
        </div>
        <div class="box">
            <h2>SIGUENOS</h2>
            <div class="redsocial">
                <a href="" ><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-pinterest"></i></a>
            </div>
        </div>
    </div>
    <div class="grupo-2">
        <small>&copy; 2022 <b>PipipupuChek</b> - Todos los Derechos Reservados.</small>
    </div>    

</footer>

<!-- mural-->
<script>
    window.addEventListener("scroll", function(){
        const header = document.querySelector("header");
        header.classList.toggle("animacion", window.scrollY > 0);
    });
</script>

<!-- Loader-->
<script src="../JS/loader.js"></script>

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<!-- validacion -->
<script src="../JS/comentarios.js"></script>

</body>
</html>