<?php

    require_once '../UTIL/ConexionBD.php';
    require_once '../BEAN/VentaBean.php';
    
    class VentaDao
    {
        
        public function RegistrarVenta(VentaBean $objventabean)
                {
            try {
                
                $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    
                    $sql = " INSERT INTO `venta` (`codigo_venta`, `importe_total`, `id_usuario`, `id_producto`) VALUES (?,?,?,?); ";
                    
                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('siii',$objventabean->CodigoVenta,$objventabean->monto,$objventabean->IdUsuario,$objventabean->IdProducto);
                    $stmt->execute();
                    
                    $response = $stmt->get_result();
                    $estado = 0;
                    if(mysqli_stmt_affected_rows($stmt)>0)
                        {
                                $estado = 1;
                                
                                
                                
                        }else
                            {
                            $estado = 0;
                            }
                
}               catch (Exception $exc) {
                echo $exc->getTraceAsString();
                                }
                          return $estado;
                        }
                
        public function ObtenerCompras()
                {
            try {
    
} catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
                        }
                        
        static function DisminuirStockProductos(VentaBean $objventabean)
    {
        try {
            
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
            
            $sql = "UPDATE libro set LI_STOCK = LI_STOCK + 1 WHERE LI_ID = '$objreserbean->reLIID'";
            
            $sql = " UPDATE `producto` SET `stock_producto` = `stock_producto` - $objreserbean-> WHERE `producto`.`Id_Producto` = 4 ";
            
            $cantidad = mysql_query($sql, $cnx);
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }
                        
            function generar_codigo_venta_complejo($largo){
      $cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
      $cadena_base .= '0123456789' ;
      $cadena_base .= '!@#%^&*()_,./<>?;:[]{}\|=+';
     
      $password = '';
      $limite = strlen($cadena_base) - 1;
     
      for ($i=0; $i < $largo; $i++)
        $password .= $cadena_base[rand(0, $limite)];
     
      return $password;
    }
       
    }

?>