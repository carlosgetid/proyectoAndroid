<?php

require_once '../UTIL/ConexionBD.php';
require_once '../BEAN/UsuarioBean.php';

    class UsuarioDao
{
        public function ValidarUsuario(UsuarioBean $objusubean)
                {
            try {
                 $cn = new ConexionBD();
                 $cnx = $cn->getConexionBD();
                 
                 $sql = " SELECT Id_Usuario as Id from usuario WHERE usuario = ? and Password = ? ; ";
                 
                $stmt = $cnx->prepare($sql);
                $stmt->bind_param('ss',$objusubean->Usuario,$objusubean->Password);
                $stmt->execute();
                   
                $estado = 0;
                
                $response = $stmt->get_result();
                            
                $LISTA = array();
                    
                if(mysqli_num_rows($response)>0)
                        {
                            while($row = mysqli_fetch_array($response,MYSQLI_ASSOC))
                                    {
                                        $Id = $row['Id'];
                                        
                                        $LISTA[] = array('estado'=>'success','Id'=>(string)$Id);
                                    }
                        }else
                            {
                                $LISTA[] = array('estado'=>'failed');
                            }
                    
                     $stmt->close();
                 
                
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
                                    }
                 return $LISTA;                   
                }
}

?>
