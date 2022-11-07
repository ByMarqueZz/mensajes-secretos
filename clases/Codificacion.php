<?php
    abstract class Codificacion{
        protected $caracterCodificado;

        protected function __construct($caracterCodificado) {
            $this->caracterCodificado = $caracterCodificado;
        }

        abstract public function decodificar();
        abstract public function codificar();
    }
?>