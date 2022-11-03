<?php
    abstract class Codificacion{
        // Función para codificar el mensaje
        abstract public function codificar($char);
        // Función para descodificar el mensaje
        abstract public function descodificar();
        abstract public function getCaracterCodificado();
    }
?>