<?php
    require_once 'clases/Codificacion.php';

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

        public function __construct($caracterCodificado) {
            parent::__construct($caracterCodificado);
        }

        public function decodificar(){
            return array_search($this->caracterCodificado, self::DICCIONARIO);
        }

        public function codificar(){
            return self::DICCIONARIO[$this->caracterCodificado];
        }
    }
?>