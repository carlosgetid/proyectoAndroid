<?php

class ProductoBean {
    
    public $IdProducto;
    public $NombreProducto;
	public $PrecioProducto;
	public $DescripcionProducto;
	public $DiminutivoProducto;
	public $IdCategoria;
  
  
  
  
	function getPrecioProducto() {
        return $this->PrecioProducto;
    }
	function getDescripcionProducto() {
        return $this->DescripcionProducto;
    }
	function getDiminutivoProducto() {
        return $this->DiminutivoProducto;
    }	
    function getIdProducto() {
        return $this->IdProducto;
    }
    function getNombreProducto() {
        return $this->NombreProducto;
    }
    function getIdCategoria() {
        return $this->IdCategoria;
    }
	function setPrecioProducto($PrecioProducto) {
        $this->PrecioProducto = $PrecioProducto;
    }
	function setDescripcionProducto($DescripcionProducto) {
        $this->DescripcionProducto = $DescripcionProducto;
    }
	function setDiminutivoProducto($DiminutivoProducto) {
        $this->DiminutivoProducto = $DiminutivoProducto;
    }
    function setIdProducto($IdProducto) {
        $this->IdProducto = $IdProducto;
    }

    function setNombreProducto($NombreProducto) {
        $this->NombreProducto = $NombreProducto;
    }

    function setIdCategoria($IdCategoria) {
        $this->IdCategoria = $IdCategoria;
    }






}

?>
