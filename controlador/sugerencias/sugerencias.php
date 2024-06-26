<?php
session_start();

//Sesion
if(isset($_SESSION['idusuario'])){

$id = $_SESSION['idusuario'];
$nombre = $_SESSION['nombrecompleto'];
$usuario = $_SESSION['usuario'];
$nombre = $_SESSION['nombrecompleto'];
$perfil = $_SESSION['perfil'];
$foto = $_SESSION['foto'];
}

//Variables del formulario
$titulo = $_POST['titulo'];
$mensaje = $_POST['mensaje'];

//Enviar correo
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPmailer/Exception.php';
require '../../PHPMailer/PHPMailer.php';
require '../../PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'cristianvelez308@gmail.com';                     //SMTP username
    $mail->Password   = 'patgpeljuspjbord';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('cristianvelez308@gmail.com', 'Usuario:     '.$nombre .',      id:     '.$id ); //De donde se va a enviar
    $mail->addAddress('cristianvelez308@gmail.com');     // A quien se va a enviar

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $titulo;
    $mail->Body    = $mensaje;

    $mail->send();
    echo '<script>
            alert("La sugerencia fue enviada, la tendremos en cuenta");
            window.location.href="../../Sugerencias.php";
        </script>';
} catch (Exception $e) {
    echo "no enviado: {$mail->ErrorInfo}";
}



?>