<?php

    class UsuarioBean
        {
            public $Id_Usuario;
            public $Usuario;
            public $Password;
            public $Activo;
          
            function getId_Usuario() {
                return $this->Id_Usuario;
            }

            function getUsuario() {
                return $this->Usuario;
            }

            function getPassword() {
                return $this->Password;
            }

            function getActivo() {
                return $this->Activo;
            }

            function setId_Usuario($Id_Usuario) {
                $this->Id_Usuario = $Id_Usuario;
            }

            function setUsuario($Usuario) {
                $this->Usuario = $Usuario;
            }

            function setPassword($Password) {
                $this->Password = $Password;
            }

            function setActivo($Activo) {
                $this->Activo = $Activo;
            }
            
        }
    
?>

