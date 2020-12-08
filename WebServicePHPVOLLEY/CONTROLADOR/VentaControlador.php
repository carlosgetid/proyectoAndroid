<?php

    require_once '../BEAN/VentaBean.php';
    require_once '../DAO/VentaDao.php';
    
    $op = $_GET['op'];
    
    switch ($op)
    {
        case "1":
            {
            
                $objventabean = new VentaBean();
                $objventadao = new VentaDao();
                
                $idproducto = $_GET['idproducto'];
                $idusuario = $_GET['idusuario'];
                $monto = $_GET['importe'];
                $codigo = substr(md5(uniqid()),0, 10);
                
                $objventabean->setCodigoVenta($codigo);
                $objventabean->setIdUsuario($idusuario);
                $objventabean->setIdProducto($idproducto);
                $objventabean->setMonto($monto);
                
                $estado = $objventadao->RegistrarVenta($objventabean);
                
                echo ($estado===1) ? "success":"failed";
            
                break;
            }
        case "2":
            {
                break;
            }
        case "3":
            {
                break;
            }
        default :
            {
                break;
            }
    }

?>
