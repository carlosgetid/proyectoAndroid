<?php

    class CategoriaBean
    {
        public $codigo;
        public $imagen;
		public $nombre;
        
		
		function getImagen() {
            return $this->imagen;
        }

        function getCodigo() {
            return $this->codigo;
        }

        function getNombre() {
            return $this->nombre;
        }

        function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        function setNombre($nombre) {
            $this->nombre = $nombre;
        }
		function setImagen($imagen) {
            $this->imagen = $imagen;
        }
        
    }

?>

