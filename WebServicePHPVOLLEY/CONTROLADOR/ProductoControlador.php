<?php

require_once '../BEAN/ProductoBean.php';
require_once '../DAO/ProductoDao.php';

$op = $_GET['op'];

switch ($op)
{
    case "1":
        {
            $objprobean = new ProductoBean();
            $objprodao = new ProductoDao();
            
            $codiCat = $_GET['codigo'];
            
            $objprobean->setIdCategoria($codiCat);
            
            $lista = $objprodao->ObtenerProductosXCategoria($objprobean);
            
            echo json_encode($lista,JSON_UNESCAPED_UNICODE);
            
            break;
        }
    case "2":
        {
            $objprobean = new ProductoBean();
            $objprodao = new ProductoDao();
            
            $nombreProducto = $_GET['nombreproducto'];
            
            $objprobean->setNombreProducto($nombreProducto);
            
            $lista = $objprodao->ObtenerProductosXNombre($objprobean);
            
            echo json_encode($lista,JSON_UNESCAPED_UNICODE);        	
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
