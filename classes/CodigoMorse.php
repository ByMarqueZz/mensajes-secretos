<?php
    require_once 'classes/Codificacion.php';

    class CodigoMorse extends Codificacion{
        const DICCIONARIO = array(
                "a" => ".-   ",
                "b" => "-... ",
                "c" => "-.-. ",
                "d" => "-..  ",
                "e" => ".    ",
                "f" => "..-. ",
                "g" => "--.  ",
                "h" => ".... ",
                "i" => "..   ",
                "j" => ".--- ",
                "k" => "-.-  ",
                "l" => ".-.. ",
                "m" => "--   ",
                "n" => "-.   ",
                "o" => "---  ",
                "p" => ".--. ",
                "q" => "--.- ",
                "r" => ".-.  ",
                "s" => "...  ",
                "t" => "-    ",
                "u" => "..-  ",
                "v" => "...- ",
                "w" => ".--  ",
                "x" => "-..- ",
                "y" => "-.-- ",
                "z" => "--.. ",
                " " => "     ",
            );

        private $caracterCodificado;

        public function __construct($caracterCodificado) {
            $this->caracterCodificado = $caracterCodificado;
        }

        public function getCaracterCodificado($char){
            return self::DICCIONARIO[$char];
        }

        public function decodificar(){
            return array_search($this->caracterCodificado, self::DICCIONARIO);
        }
    }
?>