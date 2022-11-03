<?php
    class MensajeSecreto{

        private $mensaje;
        private $mensajeCodificado;

        public function __construct($nombreFichero){
            $this->mensajeCodificado = array();
            $contenido = $this->leerFichero($nombreFichero);
            $this->separarMensaje($contenido, 1);
        }

        // getters y setters
        public function getMensaje(){
            return $this->mensaje;
        }

        public function setMensaje($mensaje){
            $this->mensaje = $mensaje;
        }

        // Métodos
        public function leerFichero($nombreFichero){
            $fichero = fopen($nombreFichero, "r");
            $contenido = fread($fichero, filesize($nombreFichero));
            return $contenido;
        }

        public function separarMensaje($contenido, $longitud){
            // separa la cadena en subcadenas de la longitud que le pases
            $this->mensaje = str_split($contenido, $longitud);
        }

        public function codificarBinario(){
            $codigoBinario = new CodigoBinario();
            foreach ($this->mensaje as $char) {
                $this->mensajeCodificado[] = $codigoBinario->codificar($char);
            }
        }
    }

?>