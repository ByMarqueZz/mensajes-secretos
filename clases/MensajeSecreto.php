<?php
    require_once 'clases/codigos/CodigoBinario.php';
    require_once 'clases/codigos/CodigoMorse.php';

    class MensajeSecreto{

        private $mensaje;

        public function __construct($nombreFichero){
            $this->mensaje = array();
            $contenido = $this->leerFichero($nombreFichero);
            if($this->isDecodificado($contenido)){
                $this->almacenarMensajeDecodificado($contenido, 1);
            } else{
                $this->almacenarMensajeCodificado($contenido, 5);
            }
        }

        public function leerFichero($nombreFichero){
            if(!file_exists($nombreFichero) || !is_readable($nombreFichero)){
                throw new Exception("El fichero no existe o no se puede leer");
            }

            $fichero = fopen($nombreFichero, "r");
            $contenido = fread($fichero, filesize($nombreFichero));
            return $contenido;
        }

        public function almacenarMensajeCodificado($contenido, $longitud){
            $mensajeCodificado = str_split($contenido, $longitud);
            foreach ($mensajeCodificado as $caracterCodificado) {
                if($this->isCodigoBinario($caracterCodificado)){
                    array_push($this->mensaje, new CodigoBinario($caracterCodificado));
                } else {
                    array_push($this->mensaje, new CodigoMorse($caracterCodificado));
                }
            }
        }

        public function almacenarMensajeDecodificado($contenido, $longitud){
            $contenidoMinuscula = strtolower($contenido);
            $mensajeDecodificado = str_split($contenidoMinuscula, $longitud);
            $formasCodificar = $this->obtenerCodigos();
            foreach ($mensajeDecodificado as $caracterDecodificado) {
                $formaCodificar = $formasCodificar[array_rand($formasCodificar)];
                array_push($this->mensaje, new $formaCodificar($caracterDecodificado));
            }
        }

        public function codificar() {
            $mensajeCodificado = "";
            foreach ($this->mensaje as $codigo) {
                $mensajeCodificado .= $codigo->codificar();
            }

            $fichero = fopen("mensajeCodificado.txt", "w");
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
        }

        private function isDecodificado($contenido){
            return preg_match("/[a-zA-Z]/", $contenido);
        }

        private function obtenerCodigos(){
            $arrFiles = scandir("./clases/codigos");
            $arrCodigos = array();
            foreach ($arrFiles as $file) {
                $file = str_replace(".php", "", $file);
                if($file != "." && $file != ".."){
                    array_push($arrCodigos, $file);
                }
            }

            return $arrCodigos;
        }
    }

?>