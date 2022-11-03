<?php
    class CodigoMorse extends Codificacion{
        static $diccionario;

        // Constructor
        public function __construct() {
            self::$diccionario = array(
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
        }
    }
?>