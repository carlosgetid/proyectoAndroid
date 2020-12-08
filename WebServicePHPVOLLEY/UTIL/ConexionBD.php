<?php

class ConexionBD
{
    const SERVER = "localhost:3306";
     const USER = "root";
     const PASS = "mysql";
     const DATABASE = "bd_volley";
     
     private $cn = null;
    
    public function getConexionBD()
            {
                 try
                {
                   //me pase a mysqli :v
                   $this->cn = mysqli_connect(self::SERVER, self::USER, self::PASS, self::DATABASE);
                   $this->cn->set_charset("utf8");
    		}
                
                catch(Exception $e)
                {
                }  
                return $this->cn;
            }
}    

?>
