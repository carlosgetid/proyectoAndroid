<?php

require_once '../BEAN/CategoriaBean.php';
require_once '../DAO/CategoriaDao.php';

$op = $_GET['op'];

switch ($op)
{
    case "1":{
        
        $objcatdao = new CategoriaDao();
        
        $lista = $objcatdao->ObtenerCategorias();
        
        echo json_encode($lista,JSON_UNESCAPED_UNICODE);
        
        break;}
    case "2":{
    break;}
    case "3":{
        break;}
    default :
        {
            break;
        }    
}

?>