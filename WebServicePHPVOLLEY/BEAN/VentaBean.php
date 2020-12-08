<?php

class VentaBean {
  
    public $IdVenta;
    public $IdProducto;
    public $IdUsuario;
    public $monto;
    public $CodigoVenta;
  
    function getIdVenta() {
        return $this->IdVenta;
    }

    function getIdProducto() {
        return $this->IdProducto;
    }

    function getIdUsuario() {
        return $this->IdUsuario;
    }

    function getMonto() {
        return $this->monto;
    }

    function getCodigoVenta() {
        return $this->CodigoVenta;
    }

    function setIdVenta($IdVenta) {
        $this->IdVenta = $IdVenta;
    }

    function setIdProducto($IdProducto) {
        $this->IdProducto = $IdProducto;
    }

    function setIdUsuario($IdUsuario) {
        $this->IdUsuario = $IdUsuario;
    }

    function setMonto($monto) {
        $this->monto = $monto;
    }

    function setCodigoVenta($CodigoVenta) {
        $this->CodigoVenta = $CodigoVenta;
    }
    
}

?>