<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Codificador de mensajes secretos</h1>
    <?php
        include ('clases/MensajeSecreto.php');
        // Decodificar
        // capturar la excepcion que se lanza cuando el fichero no existe o no se puede leer
        try{
            $mensajeSecretoCodificado = new MensajeSecreto("mensajeBinMorse.txt");
            echo $mensajeSecretoCodificado->decodificar();
        } catch (Exception $e){
            echo $e->getMessage();
        }

        // Codificar (cuando se codifica, ademas de mostrarse por pantalla, se guarda en un archivo)
        // try{
        //     $mensajeSecretoDecodificado = new MensajeSecreto("mensajeEspañol.txt");
        //     echo $mensajeSecretoDecodificado->codificar();
        // } catch (Exception $e){
        //     echo $e->getMessage();
        // }
    ?>
</body>
</html>