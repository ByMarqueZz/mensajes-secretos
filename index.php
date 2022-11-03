<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- formulario con un input con mensaje secreto -->
    <h1>Codificador de mensajes secretos</h1>
    <?php
        include ('classes/MensajeSecreto.php');
        $mensajeSecreto = new MensajeSecreto("mensaje.txt");
        print_r($mensajeSecreto->getMensaje());
    ?>
</body>
</html>