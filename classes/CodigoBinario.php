<?php
    require_once 'classes/Codificacion.php';

    class CodigoBinario extends Codificacion{
        const DICCIONARIO = array(
                "a" => "00000",
                "b" => "00001",
                "c" => "00010",
                "d" => "00011",
                "e" => "00100",
                "f" => "00101",
                "g" => "00110",
                "h" => "00111",
                "i" => "01000",
                "j" => "01001",
                "k" => "01010",
                "l" => "01011",
                "m" => "01100",
                "n" => "01101",
                "ñ" => "01110",
                "o" => "01111",
                "p" => "10000",
                "q" => "10001",
                "r" => "10010",
                "s" => "10011",
                "t" => "10100",
                "u" => "10101",
                "v" => "10110",
                "w" => "10111",
                "x" => "11000",
                "y" => "11001",
                "z" => "11010",
                " " => "11011",
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