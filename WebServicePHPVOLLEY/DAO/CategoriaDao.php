<?php

require_once '../BEAN/CategoriaBean.php';
require_once '../UTIL/ConexionBD.php';

class CategoriaDao {
    
    public function ObtenerCategorias()
            {
        try {
                $cn = new ConexionBD();
                $cnx = $cn->getConexionBD();
                $sql = " SELECT Id_Categoria as Id ,Imagen_Categoria as Img, Nombre_Categoria as Nombre FROM `categoria` ";
                $result = mysqli_query($cnx,$sql);
                
                $Lista = array();
                
                while ($fila = mysqli_fetch_assoc($result))
                            {
                        $Lista[] = array('Id'=>$fila['Id'],'Img'=>$fila['Img'],'Nombre'=>$fila['Nombre']);
                            }
    
            } catch (Exception $exc) {
                        echo $exc->getTraceAsString();
                    }
             
              return $Lista;      
            }
    
}

?>
