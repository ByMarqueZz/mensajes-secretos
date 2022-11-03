<?php
    require_once 'classes/CodigoBinario.php';
    require_once 'classes/CodigoMorse.php';

    class MensajeSecreto{

        private $mensaje;

        public function __construct($nombreFichero){
            $this->mensaje = array();
            $contenido = $this->leerFichero($nombreFichero);
            $this->separarMensaje($contenido, 5);
        }

        public function leerFichero($nombreFichero){
            $fichero = fopen($nombreFichero, "r");
            $contenido = fread($fichero, filesize($nombreFichero));
            return $contenido;
        }

        public function separarMensaje($contenido, $longitud){
            $mensajeCodificado = str_split($contenido, $longitud);
            foreach ($mensajeCodificado as $caracterCodificado) {
                if($this->isCodigoBinario($caracterCodificado)){
                    array_push($this->mensaje, new CodigoBinario($caracterCodificado));
                } else {
                    array_push($this->mensaje, new CodigoMorse($caracterCodificado));
                }
            }
        }

        public function decodificar(){
            $mensajeDecodificado = "";
            foreach ($this->mensaje as $codigo) {
                $mensajeDecodificado .= $codigo->decodificar();
            }
            return $mensajeDecodificado;
        }

        private function isCodigoBinario($caracterCodificado){
            return $caracterCodificado[0] == "0" || $caracterCodificado[0] == "1";
        }
    }

?>