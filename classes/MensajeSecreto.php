<?php
    require_once 'classes/CodigoBinario.php';
    require_once 'classes/CodigoMorse.php';

    class MensajeSecreto{

        private $mensaje;

        public function __construct($nombreFichero){
            $this->mensaje = array();
            $contenido = $this->leerFichero($nombreFichero);
            if($this->isDecodificado($contenido)){
                $this->separarMensajeDecodificado($contenido, 1);
            } else{
                $this->separarMensajeCodificado($contenido, 5);
            }
        }

        public function leerFichero($nombreFichero){
            $fichero = fopen($nombreFichero, "r");
            $contenido = fread($fichero, filesize($nombreFichero));
            return $contenido;
        }

        public function separarMensajeCodificado($contenido, $longitud){
            $mensajeCodificado = str_split($contenido, $longitud);
            foreach ($mensajeCodificado as $caracterCodificado) {
                if($this->isCodigoBinario($caracterCodificado)){
                    array_push($this->mensaje, new CodigoBinario($caracterCodificado));
                } else {
                    array_push($this->mensaje, new CodigoMorse($caracterCodificado));
                }
            }
        }

        public function separarMensajeDecodificado($contenido, $longitud){
            $contenidoMinuscula = strtolower($contenido);
            $mensajeDecodificado = str_split($contenidoMinuscula, $longitud);
            $formasCodificar = ['CodigoBinario', 'CodigoMorse'];
            foreach ($mensajeDecodificado as $caracterDecodificado) {
                array_push($this->mensaje, new $formasCodificar[array_rand($formasCodificar, 1)]($caracterDecodificado));
            }
        }

        public function codificar() {
            $mensajeCodificado = "";
            foreach ($this->mensaje as $codigo) {
                $mensajeCodificado .= $codigo->codificar();
            }

            $fichero = fopen("return.txt", "w");
            fwrite($fichero, $mensajeCodificado);
            fclose($fichero);

            return "<pre>".$mensajeCodificado."</pre>";
        }

        public function decodificar(){
            $mensajeDecodificado = "";
            foreach ($this->mensaje as $codigo) {
                $mensajeDecodificado .= $codigo->decodificar();
            }
            return $mensajeDecodificado;
        }

        private function isCodigoBinario($caracterCodificado){
            return preg_match("/[0-1]/", $caracterCodificado);
            // return $caracterCodificado[0] == "0" || $caracterCodificado[0] == "1";
        }

        private function isDecodificado($contenido){
            // expresion regular que valida si son caracteres alfabeticos
            return preg_match("/[a-zA-Z]/", $contenido);
        }
    }

?>