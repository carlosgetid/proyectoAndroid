<?php

require_once '../UTIL/ConexionBD.php';
require_once '../BEAN/ProductoBean.php';

class ProductoDao {
    
    public function ObtenerProductos()
            {
        try {
    
            } catch (Exception $exc) {
                        echo $exc->getTraceAsString();
                    }
                }
            
            public  function ObtenerProductosXCategoria(ProductoBean $objprobean)
                    {
                try {
                    
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    
                    $sql = " SELECT P.Id_Producto as Id,P.Nombre_Producto as Nombre,P.Precio_Producto as Precio,P.diminutivo_producto as Diminutivo,P.Descripcion_Producto as Descripcion,P.stock_producto as Stock,P.imagen_producto as Imagen,C.Nombre_Categoria as Categoria from producto P INNER JOIN categoria C ON P.Id_Categoria=C.Id_Categoria WHERE P.Id_Categoria = ? AND P.stock_producto > 0; ";
                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('i',$objprobean->IdCategoria);
                    $stmt->execute();
                    
                    $response = $stmt->get_result();
                    
                    $LISTA = array();
                    
                    if(mysqli_num_rows($response)>0)
                        {
                            while($row = mysqli_fetch_array($response,MYSQLI_ASSOC))
                                    {
                                        $Id = $row['Id'];
                                        $Nombre = $row['Nombre'];
                                        $Diminutivo = $row['Diminutivo'];
                                        $Stock = $row['Stock'];
                                        $Precio = $row['Precio'];
                                        $Descripcion = $row['Descripcion'];
										$Categoria = $row['Categoria'];      
										
                                        $LISTA[] = array('Id'=>$Id,'Nombre'=>$Nombre,'Stock'=>(string)$Stock,'Descripcion'=>$Descripcion,'Precio'=>(string)$Precio,'Diminutivo'=>$Diminutivo,'Descripcion'=>$Descripcion,'Categoria'=>$Categoria);
                                    }
                        }else
                            {
                                $LISTA[] = array();
                            }
                    
                     $stmt->close();
    
                    } catch (Exception $exc) {
                                        echo $exc->getTraceAsString();
                                    }
                    
                     return $LISTA;               
                    }

            
            public  function ObtenerProductosXNombre(ProductoBean $objprobean)
                    {
                try {
                    
                    $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    
                    $sql = " SELECT Id_Producto as Id,Nombre_Producto as Nombre,Precio_Producto as Precio,diminutivo_producto as Diminutivo,Descripcion_Producto as Descripcion,stock_producto as Stock,imagen_producto as Imagen from producto WHERE Nombre_Producto LIKE CONCAT('%',?,'%'); ";
                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('s',$objprobean->NombreProducto);
                    $stmt->execute();
                    
                    $response = $stmt->get_result();
                    
                    $LISTA = array();
                    
                    if(mysqli_num_rows($response)>0)
                        {
                            while($row = mysqli_fetch_array($response,MYSQLI_ASSOC))
                                    {
                                        $Id = $row['Id'];
                                        $Nombre = $row['Nombre'];
                                        $Diminutivo = $row['Diminutivo'];
                                        $Stock = $row['Stock'];
                                        $Precio = $row['Precio'];
                                        $Descripcion = $row['Descripcion'];
                                        
                                        $LISTA[] = array('Id'=>$Id,'Nombre'=>$Nombre,'Stock'=>(string)$Stock,'Descripcion'=>$Descripcion,'Precio'=>(string)$Precio,'Diminutivo'=>$Diminutivo,'Descripcion'=>$Descripcion);
                                    }
                        }else
                            {
                                $LISTA[] = array();
                            }
                    
                     $stmt->close();
    
                    } catch (Exception $exc) {
                                        echo $exc->getTraceAsString();
                                    }
                    
                     return $LISTA;               
                    }
    
}

?>
