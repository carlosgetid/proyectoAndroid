<?php

require_once '../BEAN/UsuarioBean.php';
require_once '../DAO/UsuarioDao.php';

$op = $_GET['op'];

switch ($op)
{
    case "1":
        {
            
            $usuario = $_GET['usuario'];
            $password = $_GET['password'];
            
            $objusubean = new UsuarioBean();
            $objusudao = new UsuarioDao();
            
            $objusubean->setUsuario($usuario);
            $objusubean->setPassword($password);
            
            $LISTA = $objusudao->ValidarUsuario($objusubean);
            
            header('Content-Type: application/json; charset=utf-8');
            
            echo json_encode($LISTA,JSON_UNESCAPED_UNICODE);
           
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
